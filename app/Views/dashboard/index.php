<?= $this->extend('templates/admin_template')?>
<?= $this->section('content')?>
<!-- Content Header (Page header) -->
<div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Solicitud Servicio Mantenimiento</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Menu</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-14 col-sm-6 col-md-4">
                            <div class="info-box mb-4">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-clock"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Antiguos</span>
                                    <span class="info-box-number">41,410</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-14 col-sm-6 col-md-4">
                            <div class="info-box mb-4">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-paper-plane"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Enviados</span>
                                    <span class="info-box-number">760</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-14 col-sm-6 col-md-4">
                            <div class="info-box mb-4">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hourglass-half"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">En Espera</span>
                                    <span class="info-box-number">2,000</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <div class="col-md-12">
                            <!-- TABLE: LATEST ORDERS -->
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Listado de SSM</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>idSSM</th>
                                                    <th>Area</th>
                                                    <th>Fecha</th>
                                                    <th>Linea</th>
                                                    <th>Autor</th>
                                                    <th>No_Empleado</th>
                                                    <th>Sintoma Averia</th>
                                                    <th>Descripcion Trabajo</th>
                                                    <th>Departamento</th>
                                                    <th>Prioridad</th>
                                                    <th>No_OT</th>
                                                    <th>No_ST</th>
                                                    <th>Fecha Real</th>    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($datos->result() as $key){ ?>
                                                    <tr>
                                                        <td><?= $key->id ?></td>
                                                        <td><?= $key->area ?></td>
                                                        <td><?= $key->fecha ?></td>
                                                        <td><?= $key->linea ?></td>
                                                        <td><?= $key->autor ?></td>
                                                        <td><?= $key->no_empl ?></td>
                                                        <td><?= $key->sintoma_averia ?></td>
                                                        <td><?= $key->descripcion_trabajo ?></td>
                                                        <td><?= $key->departamento ?></td>
                                                        <td><?= $key->prioridad ?></td>
                                                        <td><?= $key->no_ot ?></td>
                                                        <td><?= $key->no_st ?></td>
                                                        <td><?= $key->created_at ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!--/. container-fluid -->
            </section>
            <!-- /.content -->
<?= $this->endSection()?>

<?= $this->section('aside')?>
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?php echo base_url(); ?>/public/adming/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Solicitud SM</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url(); ?>/public/adming/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Bienvenido <br> <?= session('nombre'); ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Recibidos
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./index2.html" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Menu Principal </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-paper-plane"></i>
                                <p>
                                    Enviados
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/charts/chartjs.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Enviados</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Categorias
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-danger"></i>
                                        <p class="text">Antiguos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-success"></i>
                                        <p>Enviados</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-circle text-warning"></i>
                                        <p>En Espera</p>
                                    </a>
                                </li>
                            </ul>
                        </li>       
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
<?= $this->endSection()?>

<?= $this->section('footer')?>
<strong>Copyright &copy; 2013-2023 SSM</strong>&nbsp;&nbsp; All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
<?= $this->endSection()?>