<?php

namespace Projects\Controllers;

use Projects\Models\Processing;


class MainController
{

    public function adding($str)
    {

        if (!empty($_POST)) {
            try {

                Processing::add_data($str);
            } catch (\Exception $e) {

                echo 'Помилка додавання:' . $e->getMessage();
            }

            header('Location: /Pages/work14-16.php?mess=увас_є_завдання');
        }
    }

    public function deleteids($id)
    {
        if (!empty($id)) {
            try {

                Processing::delete_data($id);
            } catch (\Exception $e) {

                echo 'Помилка додавання:' . $e->getMessage();
            }

            header('Location: /Pages/work14-16.php?mess=ви_видалили_завдання');
        }
    }
    public function allDatas()
    {

        try {

            return $effect = Processing::data_output();
        } catch (\Exception $e) {

            echo 'Проблема із виведенням даних:' . $e->getMessage();
        }
    }
}
