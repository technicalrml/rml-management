<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Progress;

class TicketController extends Controller
{
//    VIEW Ticket
    public function index(){
        $this->data['title'] = "Ticket Management";
        $this->data['active'] = "ticket";
//        $ticket = ticket::all();
//        $this->data['ticket'] = $ticket;

        $getdata = (new Ticket())->getDataLicense();
        $this->data['ticket'] = $getdata;
        return view('ticket.view',$this->data);
    }

//    ADD ticket
    public function ShowViewticketAdd(){
        $this->data['title'] = "Ticket Management";
        $this->data['active'] = "ticket";

        $getCustomer = (new License())->getCustomer();
        $this->data['license'] = $getCustomer;

        $user = User::all();
        $this->data['user'] = $user;


        return view('ticket.add',$this->data);
    }

    public function Addticket(Request $request){

//        ADD NEW ticket
        $ticket = new ticket();
        $ticket->ticket_id = $request->input('ticket_id');
        $ticket->ticket_number = $request->input('ticket_number');
        $ticket->subject = $request->input('subject');
        $ticket->from = $request->input('from');
        $ticket->ticket_open = $request->input('ticket_open');
        $ticket->license_id = $request->input('license_id');
        $ticket->status = 'In Progress';
        $ticket->ticket_close='-';
        $ticket->created_by = $request->input('created_by');
        $ticket->update_by = $request->input('update_by');

        $ticket->save($request->except('update_by'));

        $ticket->save();

        return redirect()->route('viewticket')->with('success', 'The ticket have been successfully added');
    }
//    END OF ADD ticket

//    EDIT ticket
    function ShowViewEditticket($id){
        $this->data['title'] = 'Ticket Management';
        $this->data['active'] = "ticket";
        $this->data['ticket'] = ticket::findOrFail($id);

        $getCustomer = (new License())->getCustomer();
        $this->data['license'] = $getCustomer;

        $customer = Customer::all();
        $this->data['customer'] = $customer;

        $product = Product::all();
        $this->data['product'] = $product;

        $user = User::all();
        $this->data['user'] = $user;


        return view('ticket.edit',$this->data);
    }

    public function updateticket(Request $request, $id){
        $ticket = ticket::findOrFail($id);
        $ticket->update($request->except('created_by'));
        $ticket->update($request->all());

        return redirect()->route('viewticket')->with('success', 'Ticket updated successfully.');
    }
//    END OF EDIT ticket

//    DELETE ticket
    public function deleteticket($id)
    {
        $ticket = ticket::find($id);

        if (!$ticket) {
            return response()->json(['message' => 'ticket not found'], 404);
        }

        // Hapus ticket dari database
        $ticket->delete();

        return redirect()->route('viewticket')->with('success', 'Ticket deleted successfully');
    }

    public function getCustomerProducts($customer_id)
    {
        $customerProduct = new License();
        $customerProducts = $customerProduct->getCustomerProduct($customer_id);

        return response()->json($customerProducts);
    }

    public function getCustomerProductLicense($customer_id,$product_id)
    {
        $customerProductlicense = new License();
        $customerProductlicenses = $customerProductlicense->getCustomerProductLicense($customer_id,$product_id);

        return response()->json($customerProductlicenses);
    }

    //    DETAIL TICKET
    function ShowViewDetailTicket($id){
        $this->data['title'] = 'Ticket Progress';
        $this->data['active'] = "ticket";

        $getdata = (new Ticket())->getDataLicense();
        $this->data['getdata'] = $getdata;

        $ticket = (new Ticket())->getDataLicensedetail($id);
        $this->data['ticket'] = $ticket;

//        $this->data['ticket'] = Ticket::findOrFail($id);

        $customer = Customer::all();
        $this->data['customer'] = $customer;

        $product = Product::all();
        $this->data['product'] = $product;

        $users = User::all();
        $this->data['user'] = $users;

        $progress = Progress::where('ticket_id', $ticket->ticket_id)->get();
        $this->data['progress'] = $progress;

        return view('ticket.detail',$this->data);
    }

    function ShowProgressTicket($id){
        $this->data['title'] = 'Ticket Progress Update';
        $this->data['active'] = "ticket";
        $this->data['ticket'] = ticket::findOrFail($id);
        return view('ticket.progress',$this->data);
    }

    public function UpdateProgressticket(Request $request,$id){

//        ADD NEW ticket
        $progress = new Progress();
        $progress->ticket_id = $request->input('ticket_id');
        $progress->ticket_number = $request->input('ticket_number');
        $progress->from = $request->input('from');
        $progress->to = $request->input('to');
        $progress->status = $request->input('status');
        $progress->description = $request->input('description');
        $progress->update_date = $request->input('update_date');
        $progress->update_by = $request->input('update_by');

        $progress->save();

        $ticket = ticket::findOrFail($id);
        $ticket->status = $request->input('status');
        if ($ticket->status === 'Closed') {
            $ticket->ticket_close = $request->input('update_date');
            // Sesuaikan nama properti di atas dengan properti yang ada pada model Ticket
        }
        $ticket->ball_position = $request->input('to');
        $ticket->update($request->all());

        return redirect()->route('viewticket')->with('success', 'The ticket progress have been successfully added');
    }

}
