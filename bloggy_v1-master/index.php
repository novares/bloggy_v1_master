<?php require_once("header.inc.php"); 
include("classes/Article.php");
?>

<div class="row" id="content">
	<div class="col-md-9" id="content_text">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ...Duis aute 
	</div>
	<div class="col-md-3 hidden-xs" id="sidebar">
		Sidebar Lorem ipsum, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
	</div>



</div>

<div>
	<table class="display table table-striped table-bordered table-hover table-list" cellspacing="0" width="100%">
		<!-- Entete du tableau, à ne PAS modifier -->
		<thead>
			<tr>

				<th>Titre</th>
				<th>Texte</th>
				<th>Date</th>
				<th width="100px"></th>
			</tr>
		</thead>
		<!-- Début de la liste -->
		<?php 
		$art = new Article();	
		$liste = $art->liste();
		foreach($liste as $data )
		{
			?>
			<tbody>
				<!-- ** Début de la boucle sur le résultat de la requête SQL ** -->
				<tr>

					<td><?php echo $data->_titre; ?></td>
					<td><?php echo $data->_texte; ?></td>
					<td><?php echo $data->_d_ajout; ?></td>
					<td>
						<a href="fiche_article.php?id=<?php echo $data->_id; ?>" class="btn btn-info  btn-xs">Consulter</a>									
					</td>
				</tr>
				<!-- ** Fin de la boucle ** -->

			</tbody>
			<!-- Fin de la liste -->
			<?php  } ?>						
		</table>
	</div>

	<?php require_once("footer.inc.php"); ?>
