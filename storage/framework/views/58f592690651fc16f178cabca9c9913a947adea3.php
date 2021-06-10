<?php $__env->startSection('header'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Permission</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Administrator</td>
                    <td>
                        <ul>
                            <li>
                                User Management
                                <ul>
                                    <li>List</li>
                                    <li>Create</li>
                                    <li>Assign</li>
                                </ul>
                            </li>
                            <li>
                                Inventory
                                <ul>
                                    <li>Add</li>
                                    <li>Create</li>
                                </ul>
                            </li>
                            <li>
                                Report
                                <ul>
                                    <li>User</li>
                                    <li>Inventory</li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Supervisor</td>
                    <td>
                        <ul>
                            <li>
                                User Management
                                <ul>
                                    <li>List</li>
                                    <li>Create</li>
                                </ul>
                            </li>
                            <li>
                                Inventory
                                <ul>
                                    <li>Add</li>
                                    <li>Create</li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Staff</td>
                    <td>
                        <ul>
                            <li>
                                Inventory
                                <ul>
                                    <li>Add</li>
                                    <li>Create</li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\adminlte\pages\home.blade.php ENDPATH**/ ?>