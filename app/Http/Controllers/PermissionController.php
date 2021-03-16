<?php
namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{   

    public function Permission()
    {   
    	$vendor_permission = Permission::where('slug','*')->first();
		$admin_permission = Permission::where('slug', '*')->first();

		//RoleTableSeeder.php
		$vendor_role = new Role();
		$vendor_role->slug = 'vendor';
		$vendor_role->name = 'Vendor';
		$vendor_role->save();
		$vendor_role->permissions()->attach($vendor_permission);

		$admin_role = new Role();
		$admin_role->slug = 'admin';
		$admin_role->name = 'Admin';
		$admin_role->save();
		$admin_role->permissions()->attach($admin_permission);

		$vendor_role = Role::where('slug','vendor')->first();
		$admin_role = Role::where('slug', 'admin')->first();

		$allPermission = new Permission();
		$allPermission->slug = '*';
		$allPermission->name = 'All';
		$allPermission->save();
		$allPermission->roles()->attach($admin_role);

		$createProduct = new Permission();
		$createProduct->slug = 'create-product';
		$createProduct->name = 'Create Product';
		$createProduct->save();
		$createProduct->roles()->attach($vendor_role);

		$vendor_role = Role::where('slug','vendor')->first();
		$admin_role = Role::where('slug', 'admin')->first();
		$vendor_perm = Permission::where('slug','create-product')->first();
		$admin_perm = Permission::where('slug','*')->first();

		$vendor = new User();
		$vendor->name = 'Jitesh Gupta';
		$vendor->email = 'Jitesh@gmail.com';
		$vendor->password = bcrypt('12345678');
		$vendor->save();
		$vendor->roles()->attach($vendor_role);
		$vendor->permissions()->attach($vendor_perm);

		$admin = new User();
		$admin->name = 'Shailesh Kumar';
		$admin->email = 'shailesh94kumar@gmail.com';
		$admin->password = bcrypt('12345678');
		$admin->save();
		$admin->roles()->attach($admin_role);
		$admin->permissions()->attach($admin_perm);

		
		return redirect()->back();
    }
}