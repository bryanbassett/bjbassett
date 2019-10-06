<?php $__env->startSection('content'); ?>

  <?php use App\Item;$ItemX = new Item();?>
  <?php use App\Settings;$Setting = new Settings();?>

    <div class="container">
        <div class="jumbotron">


            <h1 class="display-1 text-center">
                <a href="mailto:admin@bjbassett.org">Bryan James Bassett</a>
            </h1>
            <?php if( ($Setting->find(1))->enabled == 0): ?>
            <p class="lead text-center">
                Portfolio currently being modified, check back in five minutes.
            </p>
            <?php else: ?>
            <p class="lead text-center">
               Application Developer
            </p>
            <?php endif; ?>
        </div>
    </div>
    <?php if( ($Setting->find(1))->enabled == 1): ?>
        <div class="container">
            <div class="row first-row">
                <div class="col-sm sec-1">
                    <?php $__currentLoopData = $section1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($sec1->noParent()): ?>
                            <div class="field-group">
                                <h3 class="field-group">
                                    <?php echo e($sec1->name); ?>

                                </h3>
                                <ul>

                                    <?php $__currentLoopData = $sec1->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <li class="<?php echo e(strtolower(str_replace(' ', '_', $item->name))); ?>">
                                            <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo $ItemX->figureIt($it_id,$item2); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </li>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php $__currentLoopData = $sec1->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4>
                                        <?php echo e($children1->name); ?>

                                    </h4>
                                    <ul>
                                        <?php $__currentLoopData = $children1->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="<?php echo e(strtolower(str_replace(' ', '_', $item->name))); ?>">
                                                <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo $ItemX->figureIt($it_id,$item2); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <?php $__currentLoopData = $children1->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grandChildren1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h5>
                                            <?php echo e($grandChildren1->name); ?>

                                        </h5>
                                        <ul>
                                            <?php $__currentLoopData = $grandChilren1->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="<?php echo e(strtolower(str_replace(' ', '_', $item->name))); ?>">
                                                    <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo $ItemX->figureIt($it_id,$item2); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="row second-row">
                <div class="col-sm sec-2">
                    <?php $__currentLoopData = $section2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($sec2->noParent()): ?>
                            <div class="field-group">
                                <h3 class="field-group">
                                    <?php echo e($sec2->name); ?>

                                </h3>
                                <ul>
                                    <?php $__currentLoopData = $sec2->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="<?php echo e(strtolower(str_replace(' ', '_', $item->name))); ?>">
                                            <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo $ItemX->figureIt($it_id,$item2); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php $__currentLoopData = $sec2->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4>
                                        <?php echo e($children2->name); ?>

                                    </h4>
                                    <ul>
                                        <?php $__currentLoopData = $children2->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="<?php echo e(strtolower(str_replace(' ', '_', $item->name))); ?>">
                                                <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo $ItemX->figureIt($it_id,$item2); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <?php $__currentLoopData = $children2->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grandChildren2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h5>
                                            <?php echo e($grandChildren2->name); ?>

                                        </h5>
                                        <ul>
                                            <?php $__currentLoopData = $grandChildren2->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="<?php echo e(strtolower(str_replace(' ', '_', $item->name))); ?>">
                                                    <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo $ItemX->figureIt($it_id,$item2); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-sm sec-3">
                    <?php $__currentLoopData = $section3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if( $sec3->noParent()): ?>
                            <div class="field-group">
                                <h3 class="field-group">
                                    <?php echo e($sec3->name); ?>

                                </h3>
                                <ul>
                                    <?php $__currentLoopData = $sec3->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="<?php echo e(strtolower(str_replace(' ', '_', $item->name))); ?>">
                                            <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo $ItemX->figureIt($it_id,$item2); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>

                                <?php $__currentLoopData = $sec3->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4>
                                        <?php echo e($children3->name); ?>

                                    </h4>
                                    <ul>
                                        <?php $__currentLoopData = $children3->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="<?php echo e(strtolower(str_replace(' ', '_', $item->name))); ?>">
                                                <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo $ItemX->figureIt($it_id,$item2); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <?php $__currentLoopData = $children3->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grandChildren3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h5>
                                            <?php echo e($grandChildren3->name); ?>

                                        </h5>
                                        <ul>
                                            <?php $__currentLoopData = $grandChildren3->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="<?php echo e(strtolower(str_replace(' ', '_', $item->name))); ?>">
                                                    <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo $ItemX->figureIt($it_id,$item2); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/WEB/bjbassett/resources/views/welcome.blade.php ENDPATH**/ ?>