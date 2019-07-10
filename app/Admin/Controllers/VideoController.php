<?php

namespace App\Admin\Controllers;

use App\Model\video;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class VideoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '视频管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new video);

        $grid->column('vid', __('Vid'));
        $grid->column('path', __('Path'));
        $grid->column('table', __('Table'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(video::findOrFail($id));

        $show->field('vid', __('Vid'));
        $show->field('path', __('Path'));
        $show->field('table', __('Table'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new video);

       // $form->text('path', __('Path'));
        $form->text('table', __('视频名称'));
        $form->file('path')->uniqueName();
        return $form;
    }
}
