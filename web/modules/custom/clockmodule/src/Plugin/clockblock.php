<?php
namespace Drupal\clockmodule\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Entity;
/**
 * @Block(
 *   id = "weather_block",
 *   admin_label = @Translation("weather block"),
 *   category = @Translation("City weather")
 * )
 */
class clockblock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function blockSubmit()
   {
   }
   public function build() {
    $service = \Drupal::service('clockmoduleservice');
    $data=$service->myservice();
    $res=Json::decode($data);
    // $config = $this->getConfiguration();
    //  return [
    //      '#theme' => 'weather',
    //      '#city' => $city,
    //      '#description'=>$desc,
    //      '#image'=> $path,
    //      '#min_temp'=>$res['main']['utcOffset'],
    //      '#max_temp'=>$res['main']['timeZoneName'],
    //      '#pressure' =>$res['main']['pressure'],
    //      '#humidity' =>$res['main']['humidity'],
    //      '#temp'=>$res['main']['temp']
    //  ];
    print($res);
      }
}