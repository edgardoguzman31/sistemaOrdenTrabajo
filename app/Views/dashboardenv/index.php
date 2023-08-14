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
                                    <button id="refreshButton" type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-solid fa-retweet"></i></button>

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
                                                    <th>No Empl </th>
                                                    <th>Sintoma Averia</th>
                                                    <th>Descripcion</th>
                                                    <th>Departamento</th>
                                                    <th>Prioridad</th>
                                                    <th>No_OT</th>
                                                    <th>No_ST</th>
                                                    <th>Fecha Real</th>
                                                    <th>Acciones</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($datos as $row) : ?>
                                                <tr>
                                                    <td><a href="<?php echo base_url(); ?>editarRegistro?id=<?php echo $row['id']; ?>"> <?php echo $row['id']; ?> </a></td> 
                                                    <td><?php echo $row['area']; ?></td>
                                                    <td><?php echo $row['fecha']; ?></td>
                                                    <td><?php echo $row['linea']; ?></td>
                                                    <td><?php echo $row['autor']; ?></td>
                                                    <td><?php echo $row['no_empl']; ?></td>
                                                    <td><?php echo $row['sintoma_averia']; ?></td>
                                                    <td><?php echo $row['descripcion_trabajo']; ?></td>
                                                    <td><?php echo $row['departamento']; ?></td>
                                                    <td  style="font-size: 13px;"><?php echo $row['prioridad']; ?></td>
                                                    <td><?php echo $row['no_ot']; ?></td>
                                                    <td><?php echo $row['no_st']; ?></td>
                                                    <td><?php echo $row['created_at']; ?></td>
                                                    <td>
                                                        <a style="height: 30px; font-size: 16px; margin-bottom:15px" href="<?php echo base_url(); ?>editarRegistro?id=<?php echo $row['id']; ?>" class="badge badge-primary btn btn-sm btn-info" onclick="return confirm('Are you sure?')"><strong>Editar <i class="fa fa-arrow-right-from-bracket"></i></strong></a>  
                                                        <!-- <a style="height: 30px; font-size: 16px;" href="<?php echo base_url(); ?>vistaeliminar?id=<?php echo $row['id']; ?>"  class="badge badge-danger btn btn-sm btn-info" onclick="return confirm('Are you sure?')"><strong>Eliminar <i class="fa fa-arrow-right-from-bracket"></i></strong></a>                                            -->
                                                    </td>
                                                    
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.card-body -->
                                <!-- <div class="card-footer clearfix">
                                    <a style="height: 30px; font-size: 16px; margin-bottom:15px" href="<?php echo base_url(); ?>vistaupdate" class="badge badge-primary btn btn-sm btn-info float-left" onclick="return confirm('Are you sure?')"><strong>Editar <i class="fa fa-arrow-right-from-bracket"></i></strong></a>  
                                    <a style="height: 30px; font-size: 16px;" href="<?php echo base_url(); ?>vistadelete"  class="badge badge-danger btn btn-sm btn-info float-right" onclick="return confirm('Are you sure?')"><strong>Eliminar <i class="fa fa-arrow-right-from-bracket"></i></strong></a>                                                    
                                            
                                </div> -->
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
            </section>
            <!-- /.content -->
            <style>
                .table-responsive {
                    overflow-x: auto;
                }

                .table {
                    width: 100%;
                    table-layout: fixed; /* Distribuir el ancho de las columnas de manera uniforme */
                }

                .table td {
                    white-space: normal; /* Texto se ajustará en varias líneas */
                }

                .table {
                    border-collapse: collapse; /* Colapsar los bordes para evitar doble grosor */
                    width: 100%;
                }

                .table th,
                .table td {
                    border: 1px solid #ccc; /* Agregar borde a las celdas */
                    padding: 8px; /* Espaciado interno para las celdas */
                    text-align: center; /* Centrar el contenido de las celdas */
                }
            </style>
<?= $this->endSection()?>

<?= $this->section('aside')?>
            <!-- Brand Logo -->
            <a href="<?php echo base_url(); ?>dashboard" class="brand-link">
                <img src="<?php echo base_url(); ?>/public/img/logo-06.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; margin-left: -11px">
                <span class="brand-text font-weight-light">Solicitud SM</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <!-- <div class="image">
                        <img src="<?php echo base_url(); ?>/public/adming/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div> -->
                    <div class="info">
                        <a href="#" class="d-block">Bienvenido <br> <?= session('nombre'); ?></a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Recibidos
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>dashboard" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Menu Principal </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-paper-plane"></i>
                                <p>
                                    Enviados
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>dashboardenviados" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Enviados</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        </li>

                        <!-- <li class="nav-item">
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
                        </li>        -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
<?= $this->endSection()?>

<?= $this->section('footer')?>
<strong>Copyright &copy; 2023-2023 SSM</strong>&nbsp;&nbsp; All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
<?= $this->endSection()?>