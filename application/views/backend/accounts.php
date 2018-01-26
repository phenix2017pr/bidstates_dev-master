<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Accounts</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <table id="datatable-responsive"
                           class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Active</th>
                            <th>Edit</th>
                        </tr>
                        </thead>

                        <?php foreach ($page_data as $account) : ?>
                            <tr>
                                <td><?php echo $account->company_name; ?></td>
                                <td><?php echo $account->customer_name; ?></td>
                                <td><?php echo $account->phone; ?></td>
                                <td><?php echo $account->email; ?></td>
                                <td><?php echo $account->address; ?></td>
                                <td class="active-user" data-id="<?php echo $account->contractor_id; ?>" data-email="<?php echo $account->email; ?>">
                                    <?php echo $account->active == 1 ? "Yes" : "No"; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() ?>admin/editContractor/<?php echo $account->contractor_id; ?>">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


</div>

<!-- /page content -->