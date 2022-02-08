Using adminui widgets for jForms
================================

The adminui module provides widget for jForms, so your forms will be well
integrated into the adminLTE theme.

In your template, you should indicate the `adminlte` jforms builder, to `{form}`
and similaire jtpl tags.

Examples: 

```html
<div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">A sample form</h3>
        </div>

        {form $form, 'test~default:formsave', array(), 'adminlte'}
            <div class="card-body">
                {formcontrols}
                <div class="form-group">
                    {ctrl_label}
                    {ctrl_control}
                </div>
                {/formcontrols}
            </div>
            <div class="card-footer">
                {formsubmit} {formreset}
            </div>
        {/form}
    </div>
```

```html

<div class="box">
    <div class="box-header">
        <h3>A sample form</h3>
    </div>
    <div class="box-body">

        {formfull $form, 'test~default:formsave', array(), 'adminlte'}

    </div>
</div>

```


```html

<div class="box">
    <div class="box-header">
        <h3>Form data</h3>
    </div>
    <div class="box-body">

        {formdatafull $form, 'adminlte'}

    </div>
</div>


```

