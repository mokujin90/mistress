<?php

class Candy
{
    const DATETIME = "Y-m-d H:i:s";
    const DATE = 'Y-m-d';
    const NORMAL = 'd.m.Y';
    const NORMALTIME = 'd.m.Y H:i:s';

    const MASK_PHONE = '+0 (000) - 000 - 0000';
    const MASK_TIME = '00:00';

    //Вернуть текущую дату в нужном формате
    public static function currentDate($format = "Y-m-d H:i:s")
    {
        return date($format);
    }

    public static function dump($var, $die = false)
    {
        CVarDumper::dump($var, 10, true);
        if ($die)
            die;
    }

    /**
     * Эмуляция $form->error, по той причине, что yii'шная валидация либо соглашается на два ajax-запроса, либо на отсутствие error-полей
     * @param $model
     * @param $field
     */
    public static function error($model, $field)
    {
        return '<div class="errorMessage" data-attribute="' . get_class($model) . '_' . $field . '" style="display: none;"></div>';
    }

    /**
     * Подобие CHtml::list с той лишь разницей, что составим список только тех записей, которые удовлетворят условиям
     */
    public static function listCondition(array $models, $field = 'id', $key = 'id', $conditionField, $conditionValue)
    {
        $list = array();
        foreach ($models as $item) {
            if ($item->{$conditionField} == $conditionValue) {
                $list[$item->{$key}] = $item->{$field};
            }
        }
        return $list;
    }

    /**
     * Такой-то сахар
     * @param $date
     * @param string $format
     * @return string
     */
    public static function formatDate($date, $format = 'd.m.Y')
    {
        $newDate = new DateTime($date);
        return $newDate->format($format);
    }

    /**
     * Сахар, для преобразования любой переменной в массив
     * @param $var
     * @return array
     */
    public static function recommend($var)
    {
        return is_array($var) ? $var : array($var);
    }

    /**
     * Обычный сеттер для переменной, с дефолтным значением в случае неопределенности
     * @param $variable
     * @param int $default
     * @return int
     */
    public static function get(&$variable, $default = 0)
    {
        return (!isset($variable)) ? $default : $variable;
    }

    /**
     * Транслитерация строки, с учетом ненужных символов
     * @param $text
     * @return mixed
     */
    public static function getLatin($text)
    {
        $text = self::convertToAlphaNum($text);
        $assoc = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
            'е' => 'e', 'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i',
            'й' => 'i', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '',
            'э' => 'a', 'ю' => 'uo', 'я' => 'ya',
        );
        $text = str_replace(array_keys($assoc), array_values($assoc), $text);
        $text = str_replace(' ', '-', $text);
        return $text;
    }

    /**
     * Перевести всю строк в нижний регистр и оставить только буквыы
     * @param $str
     * @return mixed|string
     */
    public static function convertToAlphaNum($str)
    {
        $res = preg_replace('|[^a-zа-я0-9 ]+|ui', ' ', $str);
        $res = trim(preg_replace('| {2,}|u', ' ', $res));
        $res = mb_strtolower($res);
        return $res;
    }

    /**
     * Вывести изображение . Первый параметр модель media, далее параметры будут раскидываться кто-куда.
     * @param $params [scale:{ширина}x{высота}]
     * @return string
     */
    public static function preview($params, $miss = false)
    {

        if ((!$params[0] || is_null($params[0])) && $miss){

            $scale = explode('x', $params['scale']);
            $params['style'] = "width:{$scale[0]}px;height:{$scale[1]}px";
            $res['src'] = '/images/miss/'.strtolower($miss).".png";
        }
        elseif($params[0] && !is_null($params[0])){

            $res = $params[0]->makePreview($params);

        }
        else{
            return '';
        }

        if (isset($params['src_only'])) return $res['src'];
        $tag_params = array();
        $tag_params['src'] = !empty($params['absoluteUrl']) ? (Yii::app()->request->hostInfo . $res['src'])
            : $res['src'];
        foreach ($params as $k => $v) {
            if (preg_match("/^class$|^title$|^style$|^alt$|^on*+/", $k, $matches))
                $tag_params[$k] = $v;
        }

        return CHtml::tag("img", $tag_params, false, true);
    }

    /**
     * Получить имя базы данных. Используется кеш
     * @return int
     */
    public static function dbName()
    {
        static $name = null;
        if (!$name) {
            $name = preg_match("/dbname=([^;]*)/", Yii::app()->db->connectionString, $matches);
            $name = $matches[1];
        }
        return $name;
    }

    public static function hash($string)
    {
        $salt = "*^";
        return md5(($string) . $salt);
    }

    /**
     * Метод, который, получив полный массив и выбранные id (может быть в виде сериаллайз массива),
     * вернет строку через сепоратор ответ
     * @param $fullArray
     * @param $selectedId
     */
    public static function implodeFromPart($fullArray, $selectedId, $separator = ',')
    {
        if (self::isSerialize($selectedId)) {
            $selectedId = unserialize($selectedId);
        }
        $result = '';
        foreach ($fullArray as $key => $item) {
            if (in_array($key, $selectedId))
                $result[$key] = $item;
        }
        return implode(', ', $result);
    }

    /**
     * В зависимости от id получить выбранный результат
     */
    public static function returnDictionaryValue($dictionary, $id, $separator = ',')
    {
        if (is_null($id)) {
            return $dictionary;
        } elseif (Candy::isSerialize($id) || is_array($id)) {
            return Candy::implodeFromPart($dictionary, $id, $separator);
        } else {
            return $dictionary[$id];
        }
    }

    public static function isSerialize($string)
    {
        $data = @unserialize($string);
        return $data !== false;
    }

    /**
     * Вернуть имя для элемента формы, при этом получив нечто вида Destination[name][43] (если есть id)
     * @param $model CActiveRecord
     */
    public static function modelNames($model, $attribute, $newKey = 'new')
    {
        return $model->isNewRecord ? CHtml::modelName($model) . "[{$attribute}][]" : CHtml::modelName($model) . "[{$attribute}][{$model->id}]";
    }
}