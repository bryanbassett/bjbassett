<?php $__env->startSection('content'); ?>

  <?php use App\Item;$ItemX = new Item();?>
  <?php use App\Settings;$Setting = new Settings();?>

    <div class="container">
        <div class="jumbotron">


            <h1 class="display-1 ">
               <span class="nameline">Bryan</span>
                <span class="nameline" >James</span>
                <span class="nameline">Bassett</span>
            </h1>
            <?php if( ($Setting->find(1))->enabled == 0): ?>
            <p class="lead text-center">
                Portfolio currently being modified, check back later.
            </p>
            <?php else: ?>
            <p class="lead top-title">
               Full-Stack Developer
            </p>
            <?php endif; ?>
            <p class="lead ">

            <?php if(request()->get('pdf') == true): ?>
                    <a href="#mailgo" data-address="bryan" data-domain="bjbassett.org">bryan@bjbassett.org</a> - <a class="mailgo" data-tel="2168028141">216.802.8141</a>
            <?php else: ?>
                    <a href="#mailgo" data-address="bryan" data-domain="bjbassett.org">email</a> - <a class="mailgo" data-tel="2168028141">phone</a>
            <?php endif; ?>

            </p>
        </div>
    </div>
    <?php if( ($Setting->find(1))->enabled == 0 && Auth::check()): ?>
        <div class="alert alert-primary" role="alert">
            FYI: The following content is currently being hidden.
        </div>
        <?php endif; ?>
    <?php if( ($Setting->find(1))->enabled == 1 || Auth::check()): ?>
        <div class="container">
            <div class="row first-row">
                <div class="col-sm  sec-1">
                    <?php $__currentLoopData = $section1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($sec1->noParent()): ?>
                            <div class="field-group">
                                <h3 class="field-group">
                                    <?php echo e($sec1->name); ?>

                                </h3>
                                <div class="<?php echo e(strtolower(str_replace(' ', '_', $sec1->name))); ?>">
                                    <?php $__currentLoopData = $sec1->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <items :item-identity="<?php echo e($item->id); ?>" ref="item-<?php echo e($item->id); ?>"  :items-data="<?php echo e(json_encode($ItemX->figureIt($it_id,$item2))); ?> "></items>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div style="clear:both"></div>
                                                <?php if(auth()->guard()->check()): ?>
                                                    <a class="badge badge-light" href="/edititem/<?php echo e($item->id); ?>">edit</a>
                                                <?php endif; ?>


                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php $__currentLoopData = $sec1->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4>
                                        <?php echo e($children1->name); ?>

                                    </h4>
                                    <div class="<?php echo e(strtolower(str_replace(' ', '_', $children1->name))); ?>">
                                        <?php $__currentLoopData = $children1->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <items :item-identity="<?php echo e($item->id); ?>" ref="item-<?php echo e($item->id); ?>"  :items-data="<?php echo e(json_encode($ItemX->figureIt($it_id,$item2))); ?> "></items>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <div style="clear:both"></div>
                                                    <?php if(auth()->guard()->check()): ?>
                                                        <a class="badge badge-light" href="/edititem/<?php echo e($item->id); ?>">edit</a>
                                                    <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php $__currentLoopData = $children1->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grandChildren1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h5>
                                            <?php echo e($grandChildren1->name); ?>

                                        </h5>
                                        <div class="<?php echo e(strtolower(str_replace(' ', '_', $grandChildren1->name))); ?>">
                                            <?php $__currentLoopData = $grandChildren1->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <items :item-identity="<?php echo e($item->id); ?>" ref="item-<?php echo e($item->id); ?>"  :items-data="<?php echo e(json_encode($ItemX->figureIt($it_id,$item2))); ?> "></items>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <div style="clear:both"></div>
                                                        <?php if(auth()->guard()->check()): ?>
                                                            <a class="badge badge-light" href="/edititem/<?php echo e($item->id); ?>">edit</a>
                                                        <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="row second-row">
                <div class="col-xs-12 col-sm-4   sec-2">
                    <?php $__currentLoopData = $section2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($sec2->noParent()): ?>
                            <div class="field-group">
                                <h3 class="field-group">
                                    <?php echo e($sec2->name); ?>

                                </h3>
                                <div class="<?php echo e(strtolower(str_replace(' ', '_', $sec2->name))); ?>">
                                    <?php $__currentLoopData = $sec2->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <items :item-identity="<?php echo e($item->id); ?>"  :items-data="<?php echo e(json_encode($ItemX->figureIt($it_id,$item2))); ?> "></items>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div style="clear:both"></div>

                                                <?php if(auth()->guard()->check()): ?>
                                                    <a class="badge badge-light" href="/edititem/<?php echo e($item->id); ?>">edit</a>
                                                <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php $__currentLoopData = $sec2->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4>
                                        <?php echo e($children2->name); ?>

                                    </h4>
                                    <div class="<?php echo e(strtolower(str_replace(' ', '_', $children2->name))); ?>">
                                        <?php $__currentLoopData = $children2->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <items :item-identity="<?php echo e($item->id); ?>" ref="item-<?php echo e($item->id); ?>"  :items-data="<?php echo e(json_encode($ItemX->figureIt($it_id,$item2))); ?> "></items>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <div style="clear:both"></div>
                                                    <?php if(auth()->guard()->check()): ?>
                                                        <a class="badge badge-light" href="/edititem/<?php echo e($item->id); ?>">edit</a>
                                                    <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php $__currentLoopData = $children2->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grandChildren2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h5>
                                            <?php echo e($grandChildren2->name); ?>

                                        </h5>
                                        <div class="<?php echo e(strtolower(str_replace(' ', '_', $grandChildren2->name))); ?>">
                                            <?php $__currentLoopData = $grandChildren2->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <items :item-identity="<?php echo e($item->id); ?>" ref="item-<?php echo e($item->id); ?>"  :items-data="<?php echo e(json_encode($ItemX->figureIt($it_id,$item2))); ?> "></items>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <div style="clear:both"></div>
                                                        <?php if(auth()->guard()->check()): ?>
                                                            <a class="badge badge-light" href="/edititem/<?php echo e($item->id); ?>">edit</a>
                                                        <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-xs-12 col-sm-8 sec-3">
                    <?php $__currentLoopData = $section3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if( $sec3->noParent()): ?>
                            <div class="field-group">
                                <h3 class="field-group">
                                    <?php echo e($sec3->name); ?>

                                </h3>
                                <div class="<?php echo e(strtolower(str_replace(' ', '_', $sec3->name))); ?>">
                                    <?php $__currentLoopData = $sec3->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <items :item-identity="<?php echo e($item->id); ?>" ref="item-<?php echo e($item->id); ?>"  :items-data="<?php echo e(json_encode($ItemX->figureIt($it_id,$item2))); ?> "></items>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div style="clear:both"></div>
                                                <?php if(auth()->guard()->check()): ?>
                                                    <a class="badge badge-light" href="/edititem/<?php echo e($item->id); ?>">edit</a>
                                                <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <?php $__currentLoopData = $sec3->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4>
                                        <?php echo e($children3->name); ?>

                                    </h4>
                                    <div class="<?php echo e(strtolower(str_replace(' ', '_', $children3->name))); ?>">
                                        <?php $__currentLoopData = $children3->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <items :item-identity="<?php echo e($item->id); ?>" ref="item-<?php echo e($item->id); ?>"  :items-data="<?php echo e(json_encode($ItemX->figureIt($it_id,$item2))); ?> "></items>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <div style="clear:both"></div>
                                                    <?php if(auth()->guard()->check()): ?>
                                                        <a class="badge badge-light" href="/edititem/<?php echo e($item->id); ?>">edit</a>
                                                    <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php $__currentLoopData = $children3->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grandChildren3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h5>
                                            <?php echo e($grandChildren3->name); ?>

                                        </h5>
                                        <div class="<?php echo e(strtolower(str_replace(' ', '_', $grandChildren3->name))); ?>">
                                            <?php $__currentLoopData = $grandChildren3->allItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <?php $__currentLoopData = $ItemX->deCode($item->fullContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it_id => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <items :item-identity="<?php echo e($item->id); ?>" ref="item-<?php echo e($item->id); ?>"  :items-data="<?php echo e(json_encode($ItemX->figureIt($it_id,$item2))); ?> "></items>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <div style="clear:both"></div>
                                                        <?php if(auth()->guard()->check()): ?>
                                                            <a class="badge badge-light" href="/edititem/<?php echo e($item->id); ?>">edit</a>
                                                        <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>
    <?php endif; ?>
  <div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <modalpopper ref="mp"></modalpopper>
      </div>
  </div>
    <!--  data-toggle="modal" data-target="#exampleModal" -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/WEB/bjbassett/resources/views/welcome.blade.php ENDPATH**/ ?>