<link href="<?php echo base_url(); ?>assets/admin/css/custom-main.css" rel="stylesheet">
<?php $this->load->view('themes/admin/breadcrumb');	?>
	<div id="content">
		<div class="m-b-10">
           <div class="pull-left">
               <h3 class="pull-left">
                   <strong>Hair Color List</strong>
               </h3>
           </div>
           <?php
				if($permissionValue==4 || $permissionValue==5 || $permissionValue==6 || $permissionValue==7){
			?>
			<div class="pull-right">
				<a href="<?php echo base_url('admin/bodydetails/addHairColor');?>" class="btn btn-primary">
				<i class="fa fa-plus"></i>
				Add Hair Color
				</a>
			</div>
           <?php 
				}
           ?>
       </div>
        <!-- widget grid -->
        <section id="widget-grid" class="">

            <!-- row -->
            <div class="row">

                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                        
                        <header>
                            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                            <h2><?=$list_heading?></h2>
                        </header>

                        <!-- widget div-->
                        <div>
                            <div class="jarviswidget-editbox">
                            </div>
                            <!-- end widget edit box -->

                            <!-- widget content -->
                            <div class="widget-body no-padding">

                                <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                    <thead>
											<tr>
                                                <th>Hair Color</th>
                                                <th>Gender</th>
                                                <th>Status</th>
											<?php
												if($permissionValue==2 || $permissionValue==3 || $permissionValue==6 || $permissionValue==7){
											?>
                                                <th class="sorting">Action</th>
                                            <?php
												}
                                            ?>
											</tr>
                                    </thead>
                                    <tbody>
										<?php
                                            if (!empty($hairs)) {
                                                foreach ($hairs as $hair) {
										?>
                                        <tr id="<?=$hair->id.'_A';?>">
                                           <?= form_open( 'admin/bodydetails/customHairColorEdit', ['class' => 'smart-form','id' => 'hair-color-form-'.$hair->id.' ','enctype'=>"multipart/form-data",'data-parsley-validate'=>"data-parsley-validate"]); ?>
                                            <td>
												<span class="view<?=$hair->id;?>" id="name<?=$hair->id;?>"><?=(!empty($hair->name)) ? $hair->name : "N/A";?></span>
												<input class="a<?=$hair->id;?> editable"  type="text" maxlength="100" placeholder="Hair Color" name="name" required=""  value="<?=!empty($hair->name) ? $hair->name : '';?>">
												<input type="hidden" name="id" required=""  value="<?=!empty($hair->id) ? $hair->id : 0;?>">
											</td>
											<td>
												<span class="view<?=$hair->id;?>" id="name<?=$hair->id;?>">
												<?php
													if($hair->type==1){
														echo "Female";
													}
													if($hair->type==2){
														echo "Male";
													}
													if($hair->type==3){
														echo "Other";
													}
												?>
												</span>
												<select name="type" class="a<?=$hair->id;?> editable"  data-parsley-required id="status" class="a<?=$hair->id;?>">
													<option value="">Select Gender</option>
													<option value="1" <?=!empty($hair->type) && $hair->type=='1' ? 'selected' : '' ; ?> >Female</option>
													<option value="2" <?=!empty($hair->type) && $hair->type=='2' ? 'selected' : '' ; ?> >Male</option>
													<option value="3" <?=!empty($hair->type) && $hair->type=='3' ? 'selected' : '' ; ?> >Other</option>
												</select>
											</td>
                                            <td>
												<?php
													$hairStatus = "";$hairStatusClass = "";
													if($hair->status==1){
														$hairStatusClass = "label-success";$hairStatus = "Active";
													}else{
														$hairStatusClass = "label-warning";$hairStatus = "Inactive";
													}
												?>
												<span class="view<?=$hair->id;?> label <?=$hairStatusClass;?>" id="status<?=$hair->id;?>">
												<?=$hairStatus;?>
												</span>
												<select name="status" class="a<?=$hair->id;?> editable"  data-parsley-required id="status" class="a<?=$hair->id;?>">
													<option value="1" <?=($hair->status==1) ? 'selected' : '' ?> >Active</option>
													<option value="0" <?=($hair->status==0) ? 'selected' : '' ?>>Inactive</option>
												</select>
                                            </td>
											<?php
												if($permissionValue==2 || $permissionValue==3 || $permissionValue==6 || $permissionValue==7){
											?>
											<td>
												<a class="btn btn-success view<?=$hair->id;?>" href="javascript:void(0)" data-id="<?=$hair->id?>" data-view-id="<?=$hair->id?>">Edit</a>
												<button class="btn btn-success update pull-right editable a<?=$hair->id?>" data-id="<?=$hair->id?>" onClick='submitDetailsForm('<?=$hair->id?>')'>Update</button>
											</td>
											<?php }  ?>
                                        <?= form_close(); ?>
                                        </tr>
                                        <?php } }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end widget content -->
                        </div>
                        <!-- end widget div -->
                    </div>
                    <!-- end widget -->
                </article>
                <!-- WIDGET END -->
            </div>

        </section>

    </div>
<script src="<?php echo base_url(); ?>assets/admin/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dt_basic').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
                    "t" +
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true,
        });
        
        $('#dt_basic').on('click','.btn-success', function (){
			var id = $(this).attr('data-id');
			var vId = $(this).attr('data-view-id');
			$('.view'+vId).css('display', 'none');
			if(id){
				$('.a'+id).css('display', 'block');
			}
		});
    })
</script>
