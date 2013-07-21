<h2>Donut Chart</h2>

<?php 

$data = array(
"lx"=>"",
"ly"=>"",
"values"=>"State,Under 5 Years,5 to 13 Years,14 to 17 Years,18 to 24 Years,25 to 44 Years,45 to 64 Years,65 Years and Over
AL,310504,552339,259034,450818,1231572,1215966,641667
AK,52083,85640,42153,74257,198724,183159,50277
AZ,515910,828669,362642,601943,1804762,1523681,862573
AR,202070,343207,157204,264160,754420,727124,407205
CA,2704659,4499890,2159981,3853788,10604510,8819342,4114496
CO,358280,587154,261701,466194,1464939,1290094,511094
CT,211637,403658,196918,325110,916955,968967,478007
DE,59319,99496,47414,84464,230183,230528,121688
DC,36352,50439,25225,75569,193557,140043,70648
FL,1140516,1938695,925060,1607297,4782119,4746856,3187797
GA,740521,1250460,557860,919876,2846985,2389018,981024
HI,87207,134025,64011,124834,356237,331817,190067
ID,121746,201192,89702,147606,406247,375173,182150
IL,894368,1558919,725973,1311479,3596343,3239173,1575308"
);

?>

<style>

svg {
  padding: 10px 0 0 10px;
}

.arc {
  stroke: #fff;
}

</style>

<div
  class="wcm wcm_multi_donut_chart"
  id="wgt-multi-donut-chart"
  style="width:800px;border:1px solid silver;" ><var><?php echo json_encode($data) ?></var></div>