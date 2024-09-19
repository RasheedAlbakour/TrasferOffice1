<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class DatabaseSeeder extends Seeder


{
    /**
     * Seed the application's database.
     */
    public function run()
    {
    $user = User::create([
    'name' => 'Moustafa',
    'email' => 'admin@yahoo.com',
    'password' => bcrypt('123456'),
    'roles_name' => 'admin',
    'Status' => 'مفعل' ,



    ]);
    $Admin = Role::create(['name' => 'admin']);   // دور الادمن
    $Owner = Role::create(['name' => 'owner']);  //  دور المالك




    $user_index=Permission::create(['name'=>'user-index']);//          user-index', الصفحة المقصود بها  عرض كل المسنخدمين
    $user_create=Permission::create(['name'=>'user-create']);//        user-create', الصفحة المقصود لها انشاء مستخدم
    $user_edit=Permission::create(['name'=>'user-edit']);    //        user-edit', الصفحة المقصود بها تعديل بيانات مستخدم
    $user_delete=Permission::create(['name'=>'user-delete']);    //    user-delete', المقصود  حذف مستخدم


    $office_index=Permission::create(['name'=>'office-index']);// '     office-index',الصفحة المقصود بها  عرض كل المكاتب
    $office_show=Permission::create(['name'=>'office-show']);// '       office-show', الصفحة المقصود بها  عرض معلومات عن المكتب واحد وغالبا سيكون فقط مالكه من يصل اليه
    $office_create=Permission::create(['name'=>'office-create']);// '   office-create', الصفحة المقصود بها   انشاء مكتب
    $office_edit=Permission::create(['name'=>'office-edit']); // '      office-edit', الصفحة المقصود بها   تعديل بيانات مكتب
    $office_delete=Permission::create(['name'=>'office-delete']);  // ' office-delete',  المقصود بها  حذف مكتب



    $transfer_index=Permission::create(['name'=>'transfer-index']) ;// '    transfer-index', الصفحة المقصود بها  عرض كل الحوالات لكل المكاتب
    $transfer_create=Permission::create(['name'=>'transfer-create']) ;// '  transfer-create', الصفحة المقصود بها   انشاء حوالة لمكتب ما
    $transfer_delete=Permission::create(['name'=>'transfer-delete']) ;// '  transfer-delete',   المقصود بها    حذف حوالة
    $transfer_office=Permission::create(['name'=>'transfer-office']) ;// '  transfer-office',  الصفحة المقصود بها  عرض كل الحوالات الخاصة بمكت ما الصادرة والواردة
    $transfer_markr_eceived=Permission::create(['name'=>'transfer-mark-received']) ;// '  transfer-mark-received,المقصود بها تاكيد استلام الحوالة للمستخدم الذي لديه مكتب


    $Admin->givePermissionTo([
        $user_index,
        $user_create,
        $user_edit,
        $user_delete,
        $office_index,
        $office_create,
        $office_delete,
        $office_edit,
        $transfer_index,
    ]);
    $Owner->givePermissionTo([
        $office_show,
        $office_index,
        $transfer_create,
        $transfer_delete,
        $transfer_office,
        $transfer_markr_eceived,
        ]);


    // $role->syncPermissions($permissions);
     $user->assignRole('admin');

    }
}
