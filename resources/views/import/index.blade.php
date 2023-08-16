<table>
<thead>
<tr>
    <th>Table</th>
    <th>Import</th>
    <th>View</th>
</tr>
</thead>
<tbody>
    <tr>
        <td>User</td>
        <td><a target="__blank" href="{!!asset('migrate/user/import')!!}">Import</a></td>
        <td><a target="__blank" href="{!!asset('migrate/table/view?table=users')!!}">View</a></td>
    </tr>
    <tr>
        <td>Course</td>
        <td><a target="__blank" href="{!!asset('migrate/course/import')!!}">Import</a></td>
        <td><a target="__blank" href="{!!asset('migrate/table/view?table=courses')!!}">View</a></td>
    </tr>
    <tr>
        <td>Course Category</td>
        <td><a target="__blank" href="{!!asset('migrate/course_category_import/import')!!}">Import</a></td>
        <td><a target="__blank" href="{!!asset('migrate/table/view?table=category')!!}">View</a></td>
    </tr>
    <tr>
        <td>Enrollment/Groups</td>
        <td><a target="__blank" href="{!!asset('migrate/enroll_group_import/import')!!}">Import</a></td>
        <td><a target="__blank" href="{!!asset('migrate/table/view?table=group')!!}">View</a></td>
    </tr>
    <tr>
        <td>User Enrollment/Register USer</td>
        <td><a target="__blank" href="{!!asset('migrate/enroll_group_users_import/import')!!}">Import</a></td>
        <td><a target="__blank" href="{!!asset('migrate/table/view?table=course_register')!!}">View</a></td>
    </tr>
</tbody>
</table>