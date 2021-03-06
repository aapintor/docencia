<?php $__env->startSection('content'); ?>
<?php if(Auth::user()->rol == 'DivEstProf'): ?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
				<div class="col-md-4">
					<a href="<?php echo e(route('procesotitulacion.create')); ?>" class="btn btn-raised btn-primary"><i class="material-icons">add</i></a>
				</div>
				<form action="" method="GET" class="form-horizontal">
				<div class="col-md-6 form-group">
					<input type="text" id="s" name="s" style="text-transform:uppercase;" placeholder="Buscar..." class="form-control">
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-raised btn-primary"><i class="material-icons">search</i></button>
				</div>
				</form>
			<br>
			<br>
			<br>
			<br>
			<?php echo $__env->make('procesotitulacion.fragment.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<h3>Proceso de Titulaciones</h3>
			<table class="table table-striped table-hover ">
				<thead>
					<tr>
						<th>Opción de Titulación</th>
						<th>Orden</th>
			            <th>Descripción</th>
						<th colspan="1">&nbsp;</th>
						<th colspan="1">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $procesotitulacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $procesot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
								<strong><?php echo e($procesot->nombre_opcion); ?></strong>
							</td>
							<td>
								<strong><?php echo e($procesot->orden); ?></strong>
							</td>
			                <td>
			                    <strong><?php echo e($procesot->descripcion); ?></strong>
			                </td>
							<td width="20px">
								<a href="<?php echo e(route('procesotitulacion.edit', $procesot->id)); ?>"class="btn btn-raised btn-primary">
									<i class="material-icons">create</i>
								</a>
							</td>
							<td width="20px">
								<form action="<?php echo e(route('procesotitulacion.destroy', $procesot->id)); ?>" method="POST">
									<?php echo e(csrf_field()); ?>

									<input type="hidden" name="_method" value="DELETE">
									<button class="btn btn-raised btn-primary"><i class="material-icons">clear</i></button>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /Users/aapintor/laravel/docencia/resources/views/procesotitulacion/index.blade.php */ ?>