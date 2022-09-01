<?PHP

namespace ConfrariaWeb\Crm\Services;

use ConfrariaWeb\Client\Models\Client;
use ConfrariaWeb\Contact\Models\Contact;

class CrmService
{
    public function __construct()
    {
        //
    }

    public function leads(){
        return Client::select('name')->get();
    }

    public function clients(){
        return Client::select('name')->get();
    }

    public function contacts(){
        return Contact::select('name')->get();
    }

    public function opportunities(){
        return Client::select('name')->get();
    }

}
