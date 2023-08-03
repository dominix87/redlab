<a href="<?php the_permalink();?>" class="contentItem">
  <div class="imgWrap">
    <img src="<?php the_post_thumbnail_url();?>" alt="">
  </div>
  <h2><?php the_title(); ?></h2>

  <div class="metaBlock">
    <?php $termCity = get_the_terms(get_the_ID(), 'city');?>
    <?php $termC = array_shift( $termCity ); ?>
    <span class="city">Город: <?php echo $termC->name; ?></span>
    <?php $termMonth = get_the_terms(get_the_ID(), 'month');?>
    <?php $termM = array_shift( $termMonth ); ?>
    <span class="month">Месяц: <?php echo $termM->name; ?></span>
    <?php $termYaer = get_the_terms(get_the_ID(), 'years');?>
    <?php $termY = array_shift( $termYaer ); ?>
    <span class="year">Год: <?php echo $termY->name; ?></span>
  </div>
</a>