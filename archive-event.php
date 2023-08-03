<?php get_header(); ?>

<main>
  <?php
    $cities = get_terms(array('taxonomy' => 'city'));
    $years = get_terms(array('taxonomy' => 'years'));
    $months = get_terms(array('taxonomy' => 'month', 'orderby' => 'DESC'));

  ?>
<div class="filtersBlock">
  <div class="filterCol">
    <fieldset>
      <legend>Месяцы</legend>
      <?php foreach($months as $month): ?>
        <div>
          <input type="checkbox" class="selectedElement" id="<?php echo $month->slug; ?>" name="<?php echo $month->slug; ?>" data-tax="<?php echo $month->taxonomy; ?>">
          <label for="<?php echo $month->slug; ?>"><?php echo $month->name; ?></label>
        </div>
      <?php endforeach;?>
    </fieldset>
  </div>
  <div class="filterCol">
    <fieldset>
      <legend>Года</legend>
      <?php foreach($years as $year): ?>
        <div>
          <input type="checkbox" class="selectedElement" id="<?php echo $year->slug?>" name="<?php echo $year->slug?>" data-tax="<?php echo $year->taxonomy; ?>">
          <label for="<?php echo $year->slug?>"><?php echo $year->name;?></label>
        </div>
      <?php endforeach;?>
    </fieldset>
  </div>
  <div class="filterCol">
    <fieldset>
      <legend>Города</legend>
      <select name="" id="changedSelect" data-tax="city">
        <option selected disabled>Выберите город</option>
        <?php foreach($cities as $city): ?>
          <option value="<?php echo $city->slug?>"><?php echo $city->name;?></option>
        <?php endforeach;?>
      </select>
    </fieldset>
  </div>
</div>


<?php if(have_posts()):?>
  <div class="contentWrapper">
    <?php while(have_posts()): the_post();?>
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
    <?php endwhile; ?>
  </div>
<?php endif;?>


</main>
<?php get_footer(); ?>



<style>
    .filtersBlock{
      display: flex;
      justify-content: space-between;
    }
    .filtersBlock .filterCol{
        flex: 0 0 calc(100% / 3);
    }
    .filtersBlock .filterCol .selectedElement{

    }
    .contentWrapper{
      display:flex;
      flex-wrap:wrap;
  }
  .contentWrapper .contentItem{
      display: block;
      flex: 0 0 calc(100% / 3);
      padding: 0 15px;
      margin-bottom: 15px;
  }
  .contentWrapper .contentItem h2{
      margin-top: 0;
  }
  .contentWrapper .contentItem .imgWrap{
      margin-bottom: 15px;
  }

</style>