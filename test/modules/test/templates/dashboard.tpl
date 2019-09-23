{meta_html assets 'jquery_ui'}
{meta_html js $j_basepath.'assets/pages/dashboard.js'}

<div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
        {dashboard_box 'tabs_custom'}


    </section>
    <section class="col-lg-5 connectedSortable">
        {dashboard_box 'map'}

    </section>
</div>

{dashboard_template 'template2'}