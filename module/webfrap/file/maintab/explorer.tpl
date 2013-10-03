<form
  id="wgt-dropzone-webfrap-files"
  action="ajax.php?c=Webfrap.File.dropUpload"
  method="post" ></form>

<div
  class="wcm wcm_input_dropzone dropzone"
  data-form="#wgt-dropzone-webfrap-files"
  data-folder="#wgt-dropzone-webfrap-files-folder"
  style="height:100%" >

  <!--  id of the actual folder -->
  <input type="hidden" id="wgt-dropzone-webfrap-files-folder" value="" />

  <div class="wgt-panel crumb" >
    <ul style="width:97%;min-width:940px;" class="wgt-menu crumb inline">
      <li>/</li>
      <li><a  href="" class=""><i class="icon-folder"></i> global</a></li>
      <li>/</li>
      <li><a href="maintab.php?c=Webfrap.Colab.overview" class=""><i class="icon-folder"></i> my data</a></li>
      <li>/</li>
      <li><a href="maintab.php?c=Wefrap.File.explorer" class="active"><i class="icon-folder"></i> Files</a></li>
    </ul>
  </div>


  <div id="wgt-grid-webfrap-files" class="wgt-grid left" style="min-width:900px;width:69%;" >

    <var id="wgt-grid-webfrap-files-table-cfg-grid" >{
      "height":"medium",
      "search_able":true,
      "search_form":"wgt-search-grid-webfrap-files",
      "select_able":"true"
    }</var>

    <table id="wgt-grid-webfrap-files-table" class="wgt-grid wcm wcm_widget_grid hide-head" >
      <thead>
        <tr>
          <th style="width:30px;" ><input type="checkbox" /></th>
          <th style="width:600px;" >Name</th>
          <th style="width:150px;" >Status</th>
          <th style="width:120px;" >Created</th>
          <th style="width:80px;" >Nav</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach( $VAR->folders as $folder ){ ?>
          <tr class="folder" >
            <th><input type="checkbox" value="<?php echo $folder['rowid'] ?>" /></th>
            <td><i class="<?php echo isset($folder['folder_icon'])?$folder['folder_icon']:'icon-folder' ?>" ></i><?php echo $folder['name'] ?></td>
            <td>Status</td>
            <td><?php echo $I18N->date($folder['created']); ?></td>
            <td></td>
          </tr>
        <?php } ?>
        <?php foreach( $VAR->files as $file ){ ?>
          <tr class="file" >
            <th><input type="checkbox" value="<?php echo $folder['rowid'] ?>" /></th>
            <td><i class="<?php echo isset($folder['folder_icon'])?$folder['folder_icon']:'icon-folder' ?>" ></i><?php echo $folder['name'] ?></td>
            <td>Status</td>
            <td><?php echo $I18N->date($folder['created']); ?></td>
            <td></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <div class="preview-container inline" style="min-width:300px;width:27%;" >

  </div>

  <div id="fubar-narf" style="width:500px;height:300px;" ></div>

  <div class="wgt-clear tiny">&nbsp;</div>
</div>