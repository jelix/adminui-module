{meta_html assets 'dashboard'}
{meta_html js $j_basepath.'assets/pages/dashboard.js'}
{meta_html css 'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'}


{meta_adminui page_title_locale 'test~test.dashboard.title'}
{meta_adminui sub_page_title_locale 'test~test.dashboard.sub_title',array('génial')}

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