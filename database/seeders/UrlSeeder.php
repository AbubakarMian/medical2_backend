<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Url;

class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Url::firstOrCreate(

            [
                'module_name'    => 'courses',
                'view_name'    =>  'courses.index',
                'create_name'    => 'courses.create',
                'save_name'    => 'courses.save',
                'edit_name'    => 'courses.edit',
                'update_name'    => 'courses.update',
                'delete_name'    => 'courses.delete',
                // 
                'view_url'    => 'admin/courses',
                'create_url'    => 'admin/courses/create',
                'save_url'    => 'admin/courses/save',
                'edit_url'    => 'admin/courses/edit/{id}',
                'update_url'    => 'admin/courses/update/{id}',
                'delete_url'    => 'admin/courses/delete/{id}',
            ]

        );

        Url::firstOrCreate(

            [
                'module_name'    => 'category',
                'view_name'    =>  'category.index',
                'create_name'    => 'category.create',
                'save_name'    => 'category.save',
                'edit_name'    => 'category.edit',
                'update_name'    => 'category.update',
                'delete_name'    => 'category.delete',
                // 
                'view_url'    => 'admin/category',
                'create_url'    => 'admin/category/create',
                'save_url'    => 'admin/category/save',
                'edit_url'    => 'admin/category/edit/{id}',
                'update_url'    => 'admin/category/update/{id}',
                'delete_url'    => 'admin/category/delete/{id}',
            ]

        );
        Url::firstOrCreate(

            [
                'module_name'    => 'aboutus',
                'view_name'    =>  'aboutus.index',
                'create_name'    => 'aboutus.create',
                'save_name'    => 'aboutus.save',
                'edit_name'    => 'aboutus.edit',
                'update_name'    => 'aboutus.update',
                'delete_name'    => 'aboutus.delete',
                // 
                'view_url'    => 'admin/aboutus',
                'create_url'    => 'admin/aboutus/create',
                'save_url'    => 'admin/aboutus/save',
                'edit_url'    => 'admin/aboutus/edit/{id}',
                'update_url'    => 'admin/aboutus/update/{id}',
                'delete_url'    => 'admin/aboutus/delete/{id}',
            ]

        );
        Url::firstOrCreate(

            [
                'module_name'    => 'books',
                'view_name'    =>  'books.index',
                'create_name'    => 'books.create',
                'save_name'    => 'books.save',
                'edit_name'    => 'books.edit',
                'update_name'    => 'books.update',
                'delete_name'    => 'books.delete',
                // 
                'view_url'    => 'admin/books',
                'create_url'    => 'admin/books/create',
                'save_url'    => 'admin/books/save',
                'edit_url'    => 'admin/books/edit/{id}',
                'update_url'    => 'admin/books/update/{id}',
                'delete_url'    => 'admin/books/delete/{id}',
            ]

        );
        Url::firstOrCreate(

            [
                'module_name'    => 'teacher',
                'view_name'    =>  'teacher.index',
                'create_name'    => 'teacher.create',
                'save_name'    => 'teacher.save',
                'edit_name'    => 'teacher.edit',
                'update_name'    => 'teacher.update',
                'delete_name'    => 'teacher.delete',
                // 
                'view_url'    => 'admin/teacher',
                'create_url'    => 'admin/teacher/create',
                'save_url'    => 'admin/teacher/save',
                'edit_url'    => 'admin/teacher/edit/{id}',
                'update_url'    => 'admin/teacher/update/{id}',
                'delete_url'    => 'admin/teacher/delete/{id}',
            ]

        );
        Url::firstOrCreate(

            [
                'module_name'    => 'question',
                'view_name'    =>  'admin.question',
                'create_name'    => 'question.create',
                'save_name'    => 'question.save',
                'edit_name'    => 'question.edit',
                'update_name'    => 'question.update',
                'delete_name'    => 'question.delete',
                // 
                'view_url'    => 'admin/question',
                'create_url'    => 'admin/question/create',
                'save_url'    => 'admin/question/save',
                'edit_url'    => 'admin/question/edit/{id}',
                'update_url'    => 'admin/question/update/{id}',
                'delete_url'    => 'admin/question/delete/{id}',
            ]

        );
        Url::firstOrCreate(

            [
                'module_name'    => 'quiz',
                'view_name'    =>  'quiz.index',
                'create_name'    => 'quiz.create',
                'save_name'    => 'quiz.save',
                'edit_name'    => 'quiz.edit',
                'update_name'    => 'quiz.update',
                'delete_name'    => 'quiz.delete',
                // 
                'view_url'    => 'admin/quiz',
                'create_url'    => 'admin/quiz/create',
                'save_url'    => 'admin/quiz/save',
                'edit_url'    => 'admin/quiz/edit/{id}',
                'update_url'    => 'admin/quiz/update/{id}',
                'delete_url'    => 'admin/quiz/delete/{id}',
            ]

        );
        Url::firstOrCreate(

            [
                'module_name'    => 'group',
                'view_name'    =>  'group.index',
                'create_name'    => 'group.create',
                'save_name'    => 'group.save',
                'edit_name'    => 'group.edit',
                'update_name'    => 'group.update',
                'delete_name'    => 'group.delete',
                // 
                'view_url'    => 'admin/group',
                'create_url'    => 'admin/group/create',
                'save_url'    => 'admin/group/save',
                'edit_url'    => 'admin/group/edit/{id}',
                'update_url'    => 'admin/group/update/{id}',
                'delete_url'    => 'admin/group/delete/{id}',
            ]

        );
        Url::firstOrCreate(

            [
                'module_name'    => 'student_plan',
                'view_name'    =>  'student_plan.index',
                'create_name'    => 'student_plan.create',
                'save_name'    => 'student_plan.save',
                'edit_name'    => 'student_plan.edit',
                'update_name'    => 'student_plan.update',
                'delete_name'    => 'student_plan.delete',
                // 
                'view_url'    => 'admin/student_plan',
                'create_url'    => 'admin/student_plan/create',
                'save_url'    => 'admin/student_plan/save',
                'edit_url'    => 'admin/student_plan/edit/{id}',
                'update_url'    => 'admin/student_plan/update/{id}',
                'delete_url'    => 'admin/student_plan/delete/{id}',
            ]

        );
        Url::firstOrCreate(

            [
                'module_name'    => 'workshop',
                'view_name'    =>  'workshop.index',
                'create_name'    => 'workshop.create',
                'save_name'    => 'workshop.save',
                'edit_name'    => 'workshop.edit',
                'update_name'    => 'workshop.update',
                'delete_name'    => 'workshop.delete',
                // 
                'view_url'    => 'admin/workshop',
                'create_url'    => 'admin/workshop/create',
                'save_url'    => 'admin/workshop/save',
                'edit_url'    => 'admin/workshop/edit/{id}',
                'update_url'    => 'admin/workshop/update/{id}',
                'delete_url'    => 'admin/workshop/delete/{id}',
            ]

        );
    }
}
