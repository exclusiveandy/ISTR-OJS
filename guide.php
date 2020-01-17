<?php include "header.php";?>
<?php include "../function.php";?>

  

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <h1 class="m-0 text-dark" style="font-size: 20pt; ">Author's Guide</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Journal's Guide</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    
    <!-- Main content -->
    <div class="content">
      <div class="container">

      <section class="content">


    <!-- /.FOR LOOP HERE -->


    <div class="card">
        <div class="card-header">
          <h3 class="card-title">ISTR Document Process Flow</h3>
        </div>

        <div class="card-body">

          <img  src="img/OJS Flow New.png" width="100%"/>

        </div>

    </div>


      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Guide for Authors / Contributors</h3>

        </div>
        <div class="card-body">
        
        <br>
        <ol>
                  <li>Only manuscripts that fall within the focus and scope of the Journal will be considered.</li>
                  <br>
                  <li>Manuscripts should be divided into the following sections (in this order):</li>
                  <br>
                    <ul>
                      <li><p  class="text-danger">Title Page</p></li>
                      <p>The title page should provide the title of the article, list the full names and institutional affiliation of all authors and indicate the corresponding author.</p>
                      
                      <li><p  class="text-danger">Abstract</p></li>
                      <p>The Abstract of the manuscript should not exceed 350 words and must reflect the following parts: background or the context and purpose of the study; results or the main findings; conclusions ora brief summary and potential implications. Minimize the use of abbreviations and do not cite references in the abstract.</p>
                      
                      <li><p  class="text-danger">Keyword</p></li>
                      <p>Three to ten keywords representing the main content of the article</p>

                      <li><p  class="text-danger">Introduction</p></li>
                      <p>The introduction should be written in a way that is understandable to researchers without specialist knowledge in that area and must clearly state (and if helpful, illustrate) the background to the research and its aims. The section should end with a brief statement of what is being reported in the article.
                      Standard chemical symbols and abbreviations may be used in the text, but full term should be given when first mentioned. Units of measurements should be spelled out except when preceded by a numeral. If no-metric measurement units are used the metric equivalent should be mentioned. The complete scientific name of every organism must be cited when it is first mentioned in the text. The generic name may be abbreviated thereafter, except when there are references to other genera with the same initial. The use of common names must be accompanied by the correct scientific name on first use.</p>

                      <li><p  class="text-danger">Methodology</p></li>
                      <p>This section should include the design of the study, the type of materials involved, a clear description of all comparisons, and the type of analysis used, to enable replication. For studies involving human participants, a statement detailing ethical approval and consent should be included.</p>


                      <li><p  class="text-danger">Results & Discussion</p></li>
                      <p>The results and discussion may be combined into a single section or presented separately. This section may also be broken into subsections with short, informative headings.</p>

                      <li><p  class="text-danger">Conclusions</p></li>
                      <p>This should state clearly the main conclusions of the research and give a clear explanation of their importance and relevance. Summary illustrations may be included.</p>

                      <li><p  class="text-danger">Recommendations</p></li>
                      <p>(if any)</p>

                      <li><p  class="text-danger">Acknowledgements</p></li>
                      <p>Please acknowledge anyone who contributed towards the article by making substantial contribution to conceptions, design, acquisition of data, or analysis and interpretation of data, or who was involved in drafting the manuscript or revising it critically for important intellectual content, but who does not meet the criteria for authorship. Please also include the source(s) of funding for each author, and for the manuscript preparation. Authors must describe the role of the funding body, if any, in design, in the collection, analysis and interpretation of data; in the writing of the manuscript; and in the decision to submit the manuscript for publication. Please also acknowledge anyone who contributed materials essential for the study. If a language editor has made significant revision of the manuscript, we recommend that you acknowledge the editor by name, where possible. Authors should obtain permission to acknowledge from all those mentioned in the Acknowledgements section.</p>

                      <li><p  class="text-danger">References</p></li>
                      <p>References cited in the text should be presented according to the APA (American Psychological Association) Style Manual, latest edition. The list of References should be given at the end of the paper, immediately following the section on acknowledgement, if any.</p>
                      
                      
                    </ul>
                  
                  <li>In preparing illustration and figures, ensure that each figure includes a single illustration and should fit on a single page in portrait format. If a figure consists of separate parts, it is important that a single composite illustration file be submitted which contains all parts of the figure. The following file formats can be accepted: PDF, TIFF, PNG, JPEG or BMP.Note that it is the responsibility of the author(s) to obtain permission from the copyright holder to reproduce figures or tables that have previously been published elsewhere.</li>
                  <br>
                  <li>Proofs will be sent by email to the corresponding author and are expected to proofread the article carefully. The corrected proof should be received by the administration within two working days.</li>
                  <br>
                  <li>The PUPJST adheres to the following four criteria in authorship recommended by International Committee of Medical Journal Editors (ICMJE):</li>
                    <ol>
                    <br>
                    <li>Substantial contributions to the conception or design of the work; or the acquisition, analysis, or interpretation of data for the work;</li>
                    <br>
                    <li>Drafting the work or revising it critically for important intellectual content;</li>
                    <br>
                    <li>Final approval of the version to be published;</li>
                    <br>
                    <li>Agreement to be accountable for all aspects of the work in ensuring that questions related to the accuracy or integrity of any part of the work are appropriately investigated and resolved.</li>
                    </ol>
                </ol>

                <br>
           
        </div>        <!-- /.card-body -->
        <div class="card-footer">
          <?php 
          $download_query = query("SELECT * from ojs_downloadbles");
          while($row_downloadble = fetch_assoc($download_query))
          {
          ?>
          <button type="button" class="btn btn-primary" onclick="window.location.href='download.php?path=/downloadbles/<?php echo $row_downloadble['downloadable_file'];?>'">Download <?php echo $row_downloadble['downloadable_name'];?></button>
          <?php
          }
          ?>
        </div>        <!-- /.card-footer-->
      </div>      <!-- /.card -->














      

      </section>

      <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">           
          </div><!-- /.col -->
          <div class="col-sm-6" style="padding-bottom: 2%; padding-top: 2%;">
            <ol class="breadcrumb float-sm-right">            
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


       
      </div><!-- /.container-fluid -->
    </div> <!-- /.content -->



  </div>
  <!-- /.content-wrapper -->

  <?php
  include "components/mainfooter.php";
  ?>
