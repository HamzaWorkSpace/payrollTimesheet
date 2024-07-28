<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use App\Models\User;
use App\Models\Client;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class TimesheetController extends Controller
{
    public function index(Request $request)
    {
        try {
            $timesheets = DB::table('timesheets')
                ->join('users', 'timesheets.user_id', '=', 'users.id')
                ->join('contracts', 'timesheets.contract_id', '=', 'contracts.id')
                ->join('clients', 'contracts.client_id', '=', 'clients.id')
                ->join('users as managers', 'contracts.manager_id', '=', 'managers.id')
                ->select(
                    'users.id as user_id',
                    'users.name as user_name',
                    DB::raw('MAX(clients.id) as client_id'),
                    DB::raw('MAX(clients.name) as client_name'),
                    DB::raw('MAX(contracts.id) as contract_id'),
                    DB::raw('MAX(contracts.manager_id) as manager_id'),
                    DB::raw('MAX(contracts.client_id) as contract_client_id'),
                    DB::raw('MAX(contracts.contract_title) as contract_title'),
                    DB::raw('MAX(contracts.invoicing_required) as invoicing_required'),
                    DB::raw('MAX(contracts.invoicing_scheduler) as invoicing_scheduler'),
                    DB::raw('MAX(contracts.purchase_order) as purchase_order'),
                    DB::raw('MAX(contracts.contract_start_date) as contract_start_date'),
                    DB::raw('MAX(contracts.contract_end_date) as contract_end_date'),
                    DB::raw('MAX(contracts.timesheet_frequency) as timesheet_frequency'),
                    DB::raw('MAX(contracts.timesheet_approved_by) as timesheet_approved_by'),
                    DB::raw('MAX(contracts.place_of_employment) as place_of_employment'),
                    DB::raw('MAX(contracts.jurisdiction) as jurisdiction'),
                    DB::raw('MAX(contracts.position_description) as position_description'),
                    DB::raw('MAX(contracts.award) as award'),
                    DB::raw('MAX(contracts.insurance_details) as insurance_details'),
                    DB::raw('MAX(contracts.contract_conditions) as contract_conditions'),
                    DB::raw('MAX(contracts.total_contract_units) as total_contract_units'),
                    DB::raw('MAX(contracts.rate_name) as rate_name'),
                    DB::raw('MAX(contracts.unit_of_pay) as unit_of_pay'),
                    DB::raw('MAX(contracts.pay_schedule) as pay_schedule'),
                    DB::raw('MAX(contracts.generate_sales_invoice) as generate_sales_invoice'),
                    DB::raw('MAX(contracts.contract_template) as contract_template'),
                    DB::raw('MAX(contracts.standard_hours_of_pay) as standard_hours_of_pay'),
                    DB::raw('MAX(contracts.standard_hours_in_a_day) as standard_hours_in_a_day'),
                    DB::raw('MAX(contracts.pay_amount) as pay_amount'),
                    DB::raw('MAX(contracts.charge_amount) as charge_amount'),
                    DB::raw('MAX(contracts.contract_status) as contract_status'),
                    DB::raw('MAX(contracts.additional_clause) as additional_clause'),
                    DB::raw('MAX(managers.name) as manager_name'),
                    DB::raw('MAX(timesheets.id) as timesheet_id'),
                    DB::raw('MAX(timesheets.timesheet_start) as timesheet_start'),
                    DB::raw('MAX(timesheets.timesheet_end) as timesheet_end'),
                    DB::raw('MAX(timesheets.total_unit) as total_unit')
                )
                ->groupBy('users.id', 'users.name')
                ->get();

            return view('crud.timesheets.index', compact('timesheets'));
        } catch (\Exception $e) {
            return redirect()->route('timesheets.index')->with('error', 'Failed to retrieve timesheets.');
        }
    }

    public function create($userId)
    {
        try {
            $selectedHours = [];
            $selectedNotes = [];
            $user = User::findOrFail($userId);
            $contracts = Contract::all();
            $clients = Client::all();
            $manager = User::where('role', 'manager')->get();
            $periods = $this->getWeeklyPeriodsFromStartOfYear();
            return view('crud.timesheets.create', compact('user', 'selectedHours','selectedNotes','contracts', 'clients', 'manager', 'periods'));
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('timesheets.index')->with('error', 'Failed to load create form.');
        }
    }

    public function store(Request $request)
    {

        try {
            $request->validate([
                'contract_id' => 'required|exists:contracts,id',
                'client_id' => 'required|exists:clients,id',
                'period' => 'required|string',
                'hours' => 'required|array',
                'hours.*' => 'required|numeric|min:0',
                'notes' => 'sometimes|array',
            ]);




            list($start, $end) = explode(' - ', $request->input('period'));

            $timesheet = new Timesheet();
            $timesheet->user_id = $request->input('user_id');
            $timesheet->contract_id = $request->input('contract_id');
            $timesheet->client_id = $request->input('client_id');
            $timesheet->timesheet_start = Carbon::createFromFormat('d F Y', trim($start))->format('Y-m-d');
            $timesheet->timesheet_end = Carbon::createFromFormat('d F Y', trim($end))->format('Y-m-d');
            $timesheet->status = 'pending';
            $timesheet->total_unit = array_sum($request->input('hours'));
            $timesheet->hours = $request->input('hours');
            $timesheet->notes = $request->input('notes');


            $timesheet->save();

            return redirect()->route('timesheets.viewEmployeeTimesheets', ['user_id' => $timesheet->user_id , 'page' => 1])->with('success', 'Timesheet created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('timesheets.index')->with('error', 'Failed to create timesheet.');
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'contract_id' => 'required|exists:contracts,id',
                'client_id' => 'required|exists:clients,id',
                'timesheet_start' => 'required|date',
                'timesheet_end' => 'required|date',
                'status' => 'required|string',
                'total_unit' => 'required|integer|min:0',
                'hours' => 'required|array',
                'hours.*' => 'required|numeric|min:0',
                'notes' => 'sometimes|array',
            ]);

            $timesheet = Timesheet::findOrFail($id);
            $timesheet->update($request->all());
            return redirect()->route('timesheets.index')->with('success', 'Timesheet updated successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('timesheets.index')->with('error', 'Timesheet not found.');
        } catch (\Exception $e) {
            return redirect()->route('timesheets.index')->with('error', 'Failed to update timesheet.');
        }
    }
    public function show($id)
    {
        try {
            $timesheet = Timesheet::with(['user', 'contract'])->findOrFail($id);
            return view('crud.timesheets.show', compact('timesheet'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('timesheets.index')->with('error', 'Timesheet not found.');
        } catch (\Exception $e) {
            return redirect()->route('timesheets.index')->with('error', 'Failed to retrieve timesheet.');
        }
    }

    public function edit($id)
    {
        try {
//            $timesheet =  Timesheet::find($id);
//
//            $selectedUser = User::findOrFail($timesheet->user_id);
//
//            $selectedContract = Contract::findOrFail($timesheet->contract_id);
//
//            $selectedClient = DB::table('clients')->where('id', $timesheet->client_id)->value('name');
//
//            $selectedManager = User::findOrFail($selectedContract->manager_id);
//

//
//            $selectedHours = $timesheet->hours;
//
//            $selectedNotes = $timesheet->notes;



            $timesheet = Timesheet::with(['user', 'contract.manager', 'client'])
                ->findOrFail($id);
            $selectedPeriod = $this->getPeriodFromDates($timesheet->timesheet_start, $timesheet->timesheet_end);
//          // dd($timesheet);
//
            $contracts = Contract::all();
            $clients = Client::all();
            $manager = User::where('role', 'manager')->get();
            $periods = $this->getWeeklyPeriodsFromStartOfYear();

            return view('crud.timesheets.edit', compact('timesheet',
                                                           'contracts',
                                                                      'clients',
                                                                      'manager',
                                                                      'periods',
                                                                      'selectedPeriod'
//
            ));
        } catch (ModelNotFoundException $e) {
            dd($e->getMessage());
            return redirect()->route('timesheets.index')->with('error', 'Timesheet not found.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('timesheets.index')->with('error', 'Failed to load edit form.');
        }
    }



    public function destroy($id)
    {
        try {
            $timesheet = Timesheet::findOrFail($id);
            $user_id = $timesheet->user_id;
            $timesheet->delete();


            return redirect()->route('timesheets.viewEmployeeTimesheets', ['user_id' => $user_id, 'page' => 1])->with('success', 'Timesheet deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('timesheets.index', ['page' => 1])->with('error', 'Timesheet not found.');
        } catch (\Exception $e) {
            return redirect()->route('timesheets.index', ['page' => 1])->with('error', 'Failed to delete timesheet.');
        }
    }

    public function copy(Request $request, $id)
    {
        try {
            $sourceTimesheet = Timesheet::findOrFail($id);

            $newTimesheet = $sourceTimesheet->replicate();
            $newTimesheet->timesheet_start = Carbon::createFromFormat('Y-m-d', $request->input('copyFrom'))->startOfWeek();
            $newTimesheet->timesheet_end = Carbon::createFromFormat('Y-m-d', $request->input('copyTo'))->endOfWeek();
            $newTimesheet->save();

            return redirect()->route('timesheets.index')->with('success', 'Timesheet copied successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('timesheets.index')->with('error', 'Source timesheet not found.');
        } catch (\Exception $e) {
            return redirect()->route('timesheets.index')->with('error', 'Failed to copy timesheet.');
        }
    }

    public function changeTimesheetStatus(Request $request, $id)
    {
        try {
            $requestedStatus = $request->input('actionType');
            $timesheet = Timesheet::findOrFail($id);
            $timesheet->status = $requestedStatus;
            $timesheet->save();

            return redirect()->route('timesheets.viewEmployeeTimesheets', ['user_id' => $timesheet->user_id, 'page' => 1])
                ->with('success', 'Timesheet status updated successfully.');

        } catch (ModelNotFoundException $e) {
            return redirect()->route('timesheets.viewEmployeeTimesheets', ['user_id' => $timesheet->user_id, 'page' => 1])->with('error', 'Timesheet not found.');
        } catch (\Exception $e) {
            return redirect()->route('timesheets.viewEmployeeTimesheets', ['user_id' => $timesheet->user_id, 'page' => 1])->with('error', 'Failed to update timesheet status.');
        }
    }

    private function getWeeklyPeriodsFromStartOfYear()
    {
        $startDate = Carbon::createFromDate(null, 1, 1)->startOfWeek(); // Start from the first week of the year
        $endDate = Carbon::now()->endOfWeek();
        $periods = [];

        while ($endDate->gte($startDate)) {
            $periodStart = $endDate->copy()->startOfWeek();
            $periods[] = $periodStart->format('d F Y') . ' - ' . $endDate->format('d F Y');
            $endDate->subWeek();
        }

        return $periods;
    }

    private function getPeriodFromDates($start_date, $end_date)
    {
        try {
            // Parse the start and end dates using Carbon
            $startDate = Carbon::parse($start_date)->startOfWeek();
            $endDate = Carbon::parse($end_date)->endOfWeek();

            // Format the start and end dates
            $period = $startDate->format('d F Y') . ' - ' . $endDate->format('d F Y');

            return $period;
        } catch (\Exception $e) {
            // Handle exceptions if necessary
            return 'Invalid date format';
        }
    }

    public function viewSpecificEmployeeTimesheets($id)
    {

        try {
            $employeeTimesheets = DB::table('timesheets')
                ->join('users', 'timesheets.user_id', '=', 'users.id')
                ->join('contracts', 'timesheets.contract_id', '=', 'contracts.id')
                ->join('clients', 'timesheets.client_id', '=', 'clients.id')
                ->join('users as managers', function ($join) {
                    $join->on('contracts.manager_id', '=', 'managers.id')
                        ->where('managers.role', '=', 'manager');
                })
                ->where('timesheets.user_id', $id)
                ->select(
                    'users.id as user_id',
                    'users.name as employeeName',
                    'contracts.manager_id',
                    'contracts.client_id',
                    'contracts.contract_title',
                    'contracts.invoicing_required',
                    'contracts.invoicing_scheduler',
                    'contracts.purchase_order',
                    'contracts.contract_start_date',
                    'contracts.contract_end_date',
                    'contracts.timesheet_frequency',
                    'contracts.timesheet_approved_by',
                    'contracts.place_of_employment',
                    'contracts.jurisdiction',
                    'contracts.position_description',
                    'contracts.award',
                    'contracts.insurance_details',
                    'contracts.contract_conditions',
                    'contracts.total_contract_units',
                    'contracts.rate_name',
                    'contracts.unit_of_pay',
                    'contracts.pay_schedule',
                    'contracts.generate_sales_invoice',
                    'contracts.contract_template',
                    'contracts.standard_hours_of_pay',
                    'contracts.standard_hours_in_a_day',
                    'contracts.pay_amount',
                    'contracts.charge_amount',
                    'contracts.contract_status',
                    'contracts.additional_clause',
                    'clients.name as clientName',
                    'managers.name as managerName',
                    'timesheets.id as timesheet_id',
                    'timesheets.timesheet_start',
                    'timesheets.timesheet_end',
                    'timesheets.status',
                    'timesheets.total_unit'
                )
                ->groupBy(
                    'timesheets.id',
                    'users.id',
                    'users.name',
                    'contracts.manager_id',
                    'contracts.client_id',
                    'contracts.contract_title',
                    'contracts.invoicing_required',
                    'contracts.invoicing_scheduler',
                    'contracts.purchase_order',
                    'contracts.contract_start_date',
                    'contracts.contract_end_date',
                    'contracts.timesheet_frequency',
                    'contracts.timesheet_approved_by',
                    'contracts.place_of_employment',
                    'contracts.jurisdiction',
                    'contracts.position_description',
                    'contracts.award',
                    'contracts.insurance_details',
                    'contracts.contract_conditions',
                    'contracts.total_contract_units',
                    'contracts.rate_name',
                    'contracts.unit_of_pay',
                    'contracts.pay_schedule',
                    'contracts.generate_sales_invoice',
                    'contracts.contract_template',
                    'contracts.standard_hours_of_pay',
                    'contracts.standard_hours_in_a_day',
                    'contracts.pay_amount',
                    'contracts.charge_amount',
                    'contracts.contract_status',
                    'contracts.additional_clause',
                    'clients.name',
                    'managers.name',
                    'timesheets.timesheet_start',
                    'timesheets.timesheet_end',
                    'timesheets.status',
                    'timesheets.total_unit'
                )
                ->paginate(15);

            return view('crud.timesheets.employeeTimesheet', compact('employeeTimesheets'));
        } catch (\Exception $e) {
            return redirect()->route('timesheets.index')->with('error', 'Failed to retrieve timesheets.');
        }
    }
}
