<section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="index.php?page=categories"><i class="fa fa-table"></i> Categories</a></li>
        <li class="active"><i class="fa fa-edit"></i> Edit Category</li>

    </ol>

</section>



<div class="row" id="msg_cntnr">
    <div class="col-lg-6">
        {if $msg eq ""}

        {elseif $err==1}
            <div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {$msg}
            </div>
        {else}   
            <div class="alert alert-info alert-dismissable">
                <i class="fa fa-info"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {$msg}
            </div>
        {/if}

    </div>
</div>


<div class="row" id="add_cat" style="">
    <div class="col-lg-6">
        <div class="box box-info">
            <form class="box-body" action="?page=categories&action=edit&cat_id={$cat_id}" role="form" method="post" enctype="multipart/form-data">
                <input type="hidden" value="edit" name="mode"/>
                <input type="hidden" value="{$cat_id}" name="id"/>
                <input type="text" name="cat_name"  value="{$cat.cat_name}" class="form-control" placeholder="Category name" required />
                <br/>

                Category Image(Upload a new one to change it):<br/>
                <img width="200px" draggable="false" src="{$smarty.const.A_DURI}{$smarty.const.CAT_IMGS}{$cat.cat_img}" />
                <br>
                <input type="file" name="cat_img" class="form-control"   />
                <br/>
                <textarea name="cat_description" placeholder="Category Description" class="form-control" >{$cat.cat_description}</textarea>
                <br/>

                <input type="submit" value="Save" class="btn btn-success" />
                <a href="index.php?page=categories" class="btn btn-default">Back</a>
                <input type="hidden" name="CSRF_token" value="{$token}" />
            </form>
        </div>
    </div>

</div>
<br/>