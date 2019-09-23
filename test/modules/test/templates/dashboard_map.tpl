{meta_html js $j_basepath.'adminlte-assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'}
{meta_html js $j_basepath.'assets/jvectormap/jquery-jvectormap-1.2.2.min.js'}
{meta_html css $j_basepath.'assets/jvectormap/jquery-jvectormap-1.2.2.css'}
{meta_html js $j_basepath.'assets/jvectormap/jquery-jvectormap-world-mill-en.js'}
{meta_html js $j_basepath.'adminlte-assets/bower_components/jquery-knob/dist/jquery.knob.min.js'}
{meta_html js $j_basepath.'adminlte-assets/bower_components/moment/min/moment.min.js'}
{meta_html js $j_basepath.'adminlte-assets/bower_components/bootstrap-daterangepicker/daterangepicker.js'}
{meta_html css $j_basepath.'adminlte-assets/bower_components/bootstrap-daterangepicker/daterangepicker.css'}


<div class="box box-solid bg-light-blue-gradient">
    <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"
                    title="Date range">
                <i class="fa fa-calendar"></i></button>
            <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                    data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                <i class="fa fa-minus"></i></button>
        </div>
        <!-- /. tools -->

        <i class="fa fa-map-marker"></i>

        <h3 class="box-title">
            Visitors
        </h3>
    </div>
    <div class="box-body">
        <div id="world-map" style="height: 250px; width: 100%;"></div>
    </div>
    <!-- /.box-body-->
    <div class="box-footer no-border">
        <div class="row">
            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                <div id="sparkline-1"></div>
                <div class="knob-label">Visitors</div>
            </div>
            <!-- ./col -->
            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                <div id="sparkline-2"></div>
                <div class="knob-label">Online</div>
            </div>
            <!-- ./col -->
            <div class="col-xs-4 text-center">
                <div id="sparkline-3"></div>
                <div class="knob-label">Exists</div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>
</div>