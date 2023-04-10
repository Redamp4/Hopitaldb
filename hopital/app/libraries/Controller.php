<?php
 class AbstractController {
  
  // Méthode pour charger un modèle
  protected function load($model) {
    include_once 'models/'.$model.'.php';
    return new $model();
  }
  
  // Méthode pour rendre une vue
  protected function render($view, $data = []) {
    extract($data);
    include_once 'views/'.$view.'.php';
  }





  
}
$controller = new AbstractController();
$model = $controller->load('Doctor');
$viewData = [
  'title' => 'Liste des docteurs',
  'doctors' => $model->getAllDoctors()
];
$controller->render('doctor_list', $viewData);




$control = new AbstractController();
$model = $control->load('Patient');
$viewData = [
  'title' => 'Liste des Patients',
  'doctors' => $model->getAllPatients()
];
$control->render('patients_list', $viewData);