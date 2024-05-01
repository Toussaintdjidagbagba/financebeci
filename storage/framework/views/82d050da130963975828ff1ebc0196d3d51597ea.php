

<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
            <div class="block-header">
                <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <h2>
                    <small>Organigrammes</small>
                </h2>
            </div>
            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Organigrammes
                            </h2>
                        </div>
                        <div class="body align-center"> 
                            <div id="chart_div"></div> 
                    </div>
                </div>
                
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("model"); ?>
    <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="projectModalLabel">Détails </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="projectModalBody">
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        var listhierachies = <?php echo json_encode($listhierachie); ?>;
        var users = <?php echo json_encode($users); ?>;
        google.charts.load('current', {packages:["orgchart"]});
        google.charts.setOnLoadCallback(drawChart);
    
        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Name');
            data.addColumn('string', 'Manager');
    
            var baseUrl = <?php echo json_encode(url('/')); ?>;
    
            listhierachies.forEach(function(projet) {
                var imageUrl = baseUrl + '/storage/' + projet.image_url;
                var nodeContent = '<img src="' + imageUrl + '" /><br>' + projet.libelle;
                data.addRow([{v: projet.id.toString(), f: nodeContent}, projet.hierarchiedirection ? projet.hierarchiedirection.toString() : null]);
            });
    
            var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));

            console.log(users);
    
            // Ajouter un événement de clic
            google.visualization.events.addListener(chart, 'select', function() {
                var selectedItem = chart.getSelection()[0];
                if (selectedItem) {
                    var projectId = data.getValue(selectedItem.row, 0);
                    var projectDetails = getProjectDetails(projectId);
                    displayProjectDetails(projectDetails);
                }
            });

            // Fonction pour récupérer les détails du projet
            function getProjectDetails(projectId) {
                var project = listhierachies.find(project => project.id.toString() === projectId);
                if (project) {
                    var user = users.find(user => user.idUser .toString() === project.chef.toString());
                    if (user) {
                        return {
                            name: project.libelle,
                            structure: project.structure,
                            chef: user.nom + ' ' + user.prenom,
                            matricule: project.imma,
                            photo: user.image,
                        };
                    } else {
                        return {
                            name: project.libelle,
                            structure: project.structure,
                            chef: 'Utilisateur inconnu', 
                            matricule: project.imma,
                        };
                    }
                } else {
                    return null;
                }
            }



            // Fonction pour afficher les détails du projet dans le modal
            function displayProjectDetails(details) {
                var modalBody = document.getElementById('projectModalBody');
                
                var baseUrl = <?php echo json_encode(url('/')); ?>;
                var image = baseUrl + '/storage/' + details.photo;
                var imgElement = '<img src="' + image + '" class="img-fluid" alt="Image du projet">';
                modalBody.innerHTML = `
                    <div class="row">
                        <div class="col-md-4">
                            <div id="imageContainer">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong>Nom:</strong> ${details.name}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Structure:</strong> ${details.structure}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Chef service:</strong> ${details.chef}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong>Matricule:</strong> ${details.matricule}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                $('#imageContainer').html(imgElement);
                $('#projectModal').modal('show');
            }


            google.visualization.events.addListener(chart, 'ready', function() {
                $('[data-toggle="tooltip"]').tooltip();
            });

            google.visualization.events.addListener(chart, 'onmouseover', function(e) {
                var tooltipText = '';
                var selectedItem = chart.getSelection()[0];
                if (selectedItem) {
                    var projectId = data.getValue(selectedItem.row, 0);
                    var projectName = 'Nom du Projet ' + projectId;
                    var projectMatricule = 'Matricule du Projet ' + projectId;
                    tooltipText = projectName + ' - ' + projectMatricule;
                }
                // Afficher le tooltip
                $('[data-toggle="tooltip"]').attr('title', tooltipText).tooltip('show');
            });

            google.visualization.events.addListener(chart, 'onmouseout', function() {
                // Masquer le tooltip lorsque la souris quitte la zone du rectangle
                $('[data-toggle="tooltip"]').tooltip('hide');
            });

            chart.draw(data, {allowHtml:true});
        }
    </script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/organigramme/organigramme.blade.php ENDPATH**/ ?>