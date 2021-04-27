<?php


namespace app\controllers;


use yii\filters\auth\HttpBearerAuth;
use app\models\Contact;

/**
 * Class ContactController
 * @package app\controllers
 */
class ContactController extends WSController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class
        ];
        return $behaviors;
    }

    /**
     * POST /contact
     * create contact
     *
     * @return mixed
     */
    public function actionAdd() {
        $contactname = \Yii::$app->request->post('contactname');

        $contact = new Contact();
        $contact->username = $contactname;
        $contact->description = '';
        $contact->status = 10;
        $contact->save();

        return $this->response->data = [
            'contactname' => $contact->username
        ];
    }

    /**
     * GET /contacts
     * Get contacts
     *
     * @return mixed
     */
    public function actionAll() {
        $contacts = Contact::model()->findAll();

        return $this->response->data = [
            'contacts' => $contacts
        ]; 
    }

    /**
     * PUT /contacts
     * Remove contact to favorites
     *
     * @return mixed
     */
    public function actionRemoveFavorites() {
        $id = \Yii::$app->request->post('id');

        $contact = Contact::model()->find($id);
        $contact->status = 9;
        $contact->save();

        return $this->response->data = [
            'username' => $contact->username
        ];
    }

    /**
     * POST /contacts
     * Add contact description
     *
     * @return mixed
     */
    public function actionAddDescription() {
        $id = \Yii::$app->request->post('id');
        $description = \Yii::$app->request->post('description');

        $contact = Contact::model()->find($id);
        $contact->description = $description;
        $contact->save();

        return $this->response->data = [
            'username' => $contact->username
        ];
    }

    /**
     * PUT /contacts
     * Edit contact description
     *
     * @return mixed
     */
    public function actionEditDescription() {
        $id = \Yii::$app->request->post('id');
        $description = \Yii::$app->request->post('description');

        $contact = Contact::model()->find($id);
        $contact->description = $description;
        $contact->save();

        return $this->response->data = [
            'username' => $contact->username
        ];
    }

    /**
     * POST /contacts
     * Remove contact description
     *
     * @return mixed
     */
    public function actionRemoveDescription() {
        $id = \Yii::$app->request->post('id');

        $contact = Contact::model()->find($id);
        $contact->description = '';
        $contact->save();

        return $this->response->data = [
            'username' => $contact->username
        ];
    }
}