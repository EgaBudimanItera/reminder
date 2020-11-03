      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Created By <a href="uniland.id">Uniland</a>
        </div>
        <div class="footer-right">
          Version 1.0.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?=base_url()?>/assets_stisla/jquery.min.js"></script>
  <script src="<?=base_url()?>assets_uniland/popper.min.js"></script>
  <script src="<?=base_url()?>assets_uniland/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets_uniland/jquery.nicescroll.min.js"></script>
  <script src="<?=base_url()?>assets_uniland/moment.min.js"></script>
  <script src="<?=base_url()?>/assets_stisla/js/stisla.js"></script>

  <script src="<?=base_url()?>assets_stisla/datatables/datatables.min.js"></script>
  <script src="<?=base_url()?>assets_stisla/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=base_url()?>assets_stisla/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  
<script src="<?=base_url()?>assets_uniland/select2.min.js"></script>
<script src="<?=base_url()?>assets_uniland/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>assets_uniland/buttons.flash.min.js"></script>
<script src="<?=base_url()?>assets_uniland/jszip.min.js"></script>
<script src="<?=base_url()?>assets_uniland/pdfmake.min.js"></script>
<script src="<?=base_url()?>assets_uniland/vfs_fonts.js"></script>
<script src="<?=base_url()?>assets_uniland/buttons.html5.min.js"></script>
<script src="<?=base_url()?>assets_uniland/buttons.print.min.js"></script>
  <script>
    $(document).ready( function () {
      $('.dataTables').DataTable();
      $('.dataTableExport').DataTable({
        // dom: 'Blfrtip',
        dom: 'B',
        "aLengthMenu": [25, 50, 75, 100, 150, 200],
        "ordering": false,
        // "dom": 'B<"top"f>rt<"bottom"lpi><"clear">',
        
        buttons: [
          { extend: 'copy', className: 'btn-success' },
          { extend: 'csv', className: 'btn-success' },
          { extend: 'excel', className: 'btn-success' },
          { extend: 'pdf', className: 'btn-success' },
          { extend: 'print', className: 'btn-success' }

           
        ]
      });

        
  
      
  } );
  </script>
  

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?=base_url()?>/assets_stisla/js/scripts.js"></script>
  <script src="<?=base_url()?>/assets_stisla/js/custom.js"></script>
  <script type="text/javascript">
    window.goBack = function (e){
        var defaultLocation = "http://www.mysite.com";
        var oldHash = window.location.hash;

        history.back(); // Try to go back

        var newHash = window.location.hash;

        /* If the previous page hasn't been loaded in a given time (in this case
        * 1000ms) the user is redirected to the default location given above.
        * This enables you to redirect the user to another page.
        *
        * However, you should check whether there was a referrer to the current
        * site. This is a good indicator for a previous entry in the history
        * session.
        *
        * Also you should check whether the old location differs only in the hash,
        * e.g. /index.html#top --> /index.html# shouldn't redirect to the default
        * location.
        */

        if(
            newHash === oldHash &&
            (typeof(document.referrer) !== "string" || document.referrer  === "")
        ){
            window.setTimeout(function(){
                // redirect to default location
                window.location.href = defaultLocation;
            },1000); // set timeout in ms
        }
        if(e){
            if(e.preventDefault)
                e.preventDefault();
            if(e.preventPropagation)
                e.preventPropagation();
        }
        return false; // stop event propagation and browser default event
    }

    function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
  </script>
  


  <!-- Page Specific JS File -->
  <?php 
  if(!empty($script)){
      $this->load->view($script);
  }
  ?>
</body>
</html>
