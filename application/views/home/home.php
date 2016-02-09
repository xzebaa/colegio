<!-- ventana de alerta -->
<div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body…</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<nav class="navbar navbar-default"> 
    <div class="container-fluid"> 
        <div class="navbar-header"> 
            <a class="navbar-brand" href="#">
                <img alt="Brand" width="20" height="20" src="<?php echo base_url("assets/img/baner.png"); ?>"> 
            </a> 
        </div> 

         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
       
       <?php if($this->session->userdata('RUT')){?> <li><a href="<?php echo base_url("login/login/killSession"); ?>">Salir</a></li> <?php }?>
      </ul>
    </div> 
</nav>
