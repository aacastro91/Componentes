<?php

use Adianti\Control\TAction;
use Adianti\Widget\Base\TElement;
use Adianti\Widget\Base\TScript;
use Adianti\Widget\Container\TTable;
use Adianti\Widget\Datagrid\TDataGridAction;
use Adianti\Widget\Util\TImage;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class aDataGrid extends TTable {

    private $columns;
    private $modelCreated;
    private $actions;
    private $rowCount;
    private $tbody;
    private $thead;
    private $actionWidth;
    private $objects;
    private $order;
    private $scrollable;
    private $enableSearch;
    private $enableLengthChange;
    private $enableOrder;
    private $responsive;
    private $defaultClick;
    private $enableInformation;
    private $enablePagination;
    private $URLserverside;
    private $actionCount;
    private $defaultOrder;

    /**
     * @return mixed
     */
    public function getActionCount() {
        return $this->actionCount;
    }

    function getDefaultOrder() {
        return $this->defaultOrder;
    }

    function setDefaultOrder($defaultOrder) {
        $this->defaultOrder = $defaultOrder;
    }

    /**
     * @param mixed $actionCount
     */
    public function setActionCount($actionCount) {
        $this->actionCount = $actionCount;
    }

    public function __construct() {
        parent::__construct();
        //Adianti\Control\TPage::include_js('app/lib/Components/DataGrid/jquery.dataTables.min.js');
        Adianti\Control\TPage::include_css('app/lib/Components/DataGrid/jquery-ui.css');
        Adianti\Control\TPage::include_css('app/lib/Components/DataGrid/dataTables.jqueryui.min.css');
        Adianti\Control\TPage::include_js('app/lib/Components/DataGrid/dataTables.jqueryui.min.js');
        Adianti\Control\TPage::include_css('app/lib/Components/DataGrid/custom.css');
        $this->modelCreated = FALSE;
        $this->scrollable = 0;
        $this->enableSearch = true;
        $this->enableLengthChange = true;
        $this->enableOrder = false;
        $this->responsive = true;
        $this->enableInformation = true;
        $this->enablePagination = true;
        $this->URLserverside = '';
        $this->actionCount = 0;
        $this->width = '100%';

        $this->id = 'grid_' . uniqid();

        $this->defaultClick = false;
        $this->defaultOrder = NULL;
        //$this->popover = FALSE;
        //$this->groupColumn = NULL;
        //$this->groupContent = NULL;
        //$this->groupMask = NULL;
        //$this->groupCount = 0;
        $this->actions = array();
        //$this->action_groups = array();
        $this->actionWidth = '16px';
        $this->{'class'} = 'table table-striped responsive-utilities jambo_table';
        //$this->{'class'} = 'display nowrap';
    }

    public function setURLserverSide($url) {
        $this->URLserverside = $url;
    }

    public function setPaginationEnabled($enable) {
        $this->enablePagination = $enable;
    }

    public function setDefaultClick($enable) {
        $this->defaultClick = $enable;
    }

    public function setSearchEnabled($enable) {
        $this->enableSearch = $enable;
    }

    public function setLengthChangeEnabled($enable) {
        $this->enableLengthChange = $enable;
    }

    public function setOrderingEnabled($enable) {
        $this->enableOrder = $enable;
    }

    public function setResponsiveEnabled($enable) {
        $this->responsive = $enable;
    }

    public function setInformationEnabled($enable) {
        $this->enableInformation = $enable;
    }

    /**
     * Adiciona uma coluna no datagrid
     * @param type $coluna
     * @throws Exception
     */
    public function addColumn(aDataGridColumn $coluna) {
        if ($this->modelCreated) {
            throw new Exception('Você deve chamar ^1 antes de ^2', __METHOD__, 'createModel');
        } else {
            $this->columns[] = $coluna;
        }
    }

    public function addAction(TDataGridAction $action) {
        if (!$action->getField()) {
            throw new Exception('Devina um campo para a ação ^1', $action->toString());
        }

        if ($this->modelCreated) {
            throw new Exception('Você deve chamar ^1 antes de ^2', __METHOD__, 'createModel');
        } else {
            $this->actions[] = $action;
        }
    }

    public function addItem($object) {
        if ($this->modelCreated) {
            $classname = ($this->rowCount % 2) == 0 ? 'even' : 'odd';

            $row = new TElement('tr');
            $this->tbody->add($row);
            $row->{'class'} = $classname . ' pointer';
            $index = 0;
            if ($this->actions) {
                if (!isset($this->order))
                    $this->order = "";
                foreach ($this->actions as $action) {
                    $this->prepareAction($action, $object);

                    $label = $action->getLabel();
                    $image = $action->getImage();

                    $condition = $action->getDisplayCondition();

                    $this->order = ($this->order === "") ? (string) $index : (string) $this->order . ', ' . $index;
                    $index++;

                    if (empty($condition) or call_user_func($condition, $object)) {
                        $url = $action->serialize();
                        $first_url = isset($first_url) ? $first_url : $url;

                        //create a link
                        $link = new TElement('a');
                        $link->href = $url;
                        $link->generator = 'adianti';

                        // verify if the link will have an icon or a label
                        if ($image) {
                            $image_tag = new TImage($image);
                            $image_tag->title = $label;

                            if ($action->getUseButton()) {
                                // add the label to the link
                                $span = new TElement('span');
                                $span->{'class'} = $action->getButtonClass() ? $action->getButtonClass() : 'btn btn-default';
                                $span->add($image_tag);
                                $span->add($label);
                                $link->add($span);
                            } else {
                                $link->add($image_tag);
                            }
                        } else {
                            // add the label to the link
                            $span = new TElement('span');
                            $span->{'class'} = $action->getButtonClass() ? $action->getButtonClass() : 'btn btn-default';
                            $span->add($label);
                            $link->add($span);
                        }
                    } else {
                        $link = '';
                    }

                    // add the cell to the row
                    $cell = new TElement('td');
                    $row->add($cell);
                    $cell->add($link);
                    $cell->width = $this->actionWidth;
                    $cell->{'class'} = ' ';
                }
            }

            if ($this->columns) {
                // iterate the DataGrid columns
                // $index = 0;
                foreach ($this->columns as $column) {
                    if (!$column->getOrder()) {
                        $this->order = ($this->order == "") ? (string) $index : (string) $this->order . ', ' . (string) $index;
                    }
                    $index++;
                    // get the column properties
                    $name = $column->getName();
                    $align = $column->getAlign();
                    $width = $column->getWidth();
                    $function = $column->getTransformer();
                    $content = $object->$name;
                    $data = is_null($content) ? '' : $content;
                    // verify if there's a transformer function
                    if ($function) {
                        // apply the transformer functions over the data
                        $data = call_user_func($function, $data, $object, $row);
                    }

                    if ($editaction = $column->getEditAction()) {
                        $editaction_field = $editaction->getField();
                        $div = new TElement('div');
                        $div->{'class'} = 'inlineediting';
                        $div->{'style'} = 'padding-left:5px;padding-right:5px';
                        $div->{'action'} = $editaction->serialize();
                        $div->{'field'} = $name;
                        $div->{'key'} = isset($object->{$editaction_field}) ? $object->{$editaction_field} : NULL;
                        $div->add($data);
                        $cell = new TElement('td');
                        $row->add($cell);
                        $cell->add($div);
                        $cell->{'class'} = ' ';
                    } else {
                        // add the cell to the row
                        $cell = new TElement('td');
                        $row->add($cell);
                        $cell->add($data);
                        $cell->{'class'} = ' ';
                        //if ($align == 'right') {
                        //    $cell->{'class'} = ' a-right';
                        //    $cell->align = $align;
                        //}
                        $cell->align = $align;

                        if (isset($first_url) AND $this->defaultClick) {
                            $cell->{'href'} = $first_url;
                            $cell->{'generator'} = 'adianti';
                            $cell->{'class'} = '';
                        }
                    }
                    if ($width) {
                        $cell->{'width'} = $width . 'px';
                    }
                }
            }
            $cell->{'class'} = $cell->{'class'} . ' last';
            $this->objects[$this->rowCount] = $object;
            $this->rowCount++;
        } else {
            throw new Exception('Você deve chamar primeiro createModel antes de ' . __METHOD__);
        }
    }

    private function prepareAction(TAction $action, $object) {
        $field = $action->getField();

        if (is_null($field)) {
            throw new Exception("Campo da ação {$label} nã" . "o definido <br> Use o método setField().");
        }

        if (!isset($object->$field)) {
            throw new Exception("Campo {$field} não existe");
        }

        $key = isset($object->$field) ? $object->$field : NULL;
        $action->setParameter('key', $key);
    }

    /**
     * Creates the DataGrid Structure
     */
    public function createModel() {

        if (!$this->columns) {

            return;
        }

        $this->thead = new TElement('thead');
        //$this->thead->{'class'} = '';
        parent::add($this->thead);

        $row = new TElement('tr');
        //if ($this->scrollable)
        //{
        //    $this->thead->{'style'} = 'display:block';
        //}
        $row->{'class'} = 'headings';
        $this->thead->add($row);

        $actions_count = count($this->actions) + count($this->action_groups);

        if ($actions_count > 0) {
            for ($n = 0; $n < $actions_count; $n++) {
                $cell = new TElement('th');
                $row->add($cell);
                $cell->add('&nbsp;');
                $cell->{'class'} = 'no-link';
                //$cell->style = "width = {$this->actionWidth};";
                $cell->style = "width : {$this->actionWidth};";
                //$cell->width = $this->actionWidth;
            }

            $cell->{'class'} = 'no-link';
        }

        // add some cells for the data
        if ($this->columns) {
            // iterate the DataGrid columns

            foreach ($this->columns as $column) {
                // get the column properties
                $name = $column->getName();
                $label = '&nbsp;' . $column->getLabel() . '&nbsp;';
                $align = $column->getAlign();
                $width = $column->getWidth();
                if (isset($_GET['order'])) {
                    if ($_GET['order'] == $name) {
                        if (isset($_GET['direction']) AND $_GET['direction'] == 'asc') {
                            $label .= '<span class="glyphicon glyphicon-chevron-down blue" aria-hidden="true"></span>';
                        } else {
                            $label .= '<span class="glyphicon glyphicon-chevron-up blue" aria-hidden="true"></span>';
                        }
                    }
                }
                // add a cell with the columns label
                $cell = new TElement('th');
                $row->add($cell);
                $cell->add($label);

                //$cell->{'class'} = 'tdatagrid_col';
                if ($align == 'right')
                    $cell->{'style'} = "text-align:$align;";
                if ($width) {
                    $cell->{'style'} .= 'width: ' . ($width + 8) . 'px';
                    //$cell->width = ($width + 8) . 'px';
                }

                // verify if the column has an attached action
                if ($column->getAction()) {
                    $action = $column->getAction();
                    if (isset($_GET['direction']) AND $_GET['direction'] == 'asc' AND isset($_GET['order']) AND ( $_GET['order'] == $name)) {
                        $action->setParameter('direction', 'desc');
                    } else {
                        $action->setParameter('direction', 'asc');
                    }
                    $url = $action->serialize();
                    $cell->href = $url;
                    $cell->generator = 'adianti';
                }
            }

            /* if ($this->scrollable)
              {
              $cell = new TElement('td');
              $cell->{'class'} = 'tdatagrid_col';
              $row->add($cell);
              $cell->add('&nbsp;');
              $cell-> width = '12px';
              } */
        }

        $cell->{'class'} = $cell->{'class'} . ' last';

        // add one row to the DataGrid
        $this->tbody = new TElement('tbody');
        $this->tbody->{'class'} = '';
        /* if ($this->scrollable)
          {
          $this->tbody->{'style'} = "height: {$this->height}px; display: block; overflow-y:scroll; overflow-x:hidden;";
          } */
        parent::add($this->tbody);

        $this->modelCreated = TRUE;
    }

    /**
     * Clear the DataGrid contents
     */
    function clear($preserveHeader = TRUE) {
        if ($this->modelCreated) {
            if ($preserveHeader) {
                // copy the headers
                $copy = $this->children[0];
                // reset the row array
                $this->children = array();
                // add the header again
                $this->children[] = $copy;
            } else {
                // reset the row array
                $this->children = array();
            }

            // add an empty body
            $this->tbody = new TElement('tbody');
            //$this->tbody->{'class'} = 'tdatagrid_body';
            //if ($this->scrollable)
            //{
            //    $this->tbody->{'style'} = "height: {$this->height}px; display: block; overflow-y:scroll; overflow-x:hidden;";
            //}
            parent::add($this->tbody);

            // restart the row count
            $this->rowcount = 0;
        }
    }

    /**
     * Make the datagrid scrollable
     */
    public function makeScrollable($size) {
        $this->scrollable = $size;
    }

    private function generateOrder() {
        $index = 0;
        $this->order = '';        
        if ($this->actions) {
            foreach ($this->actions as $action) {
                $this->order = ($this->order === "") ? (string) $index : (string) $this->order . ', ' . $index;
                $index++;
            }
        }

        if ($this->columns) {
            
            foreach ($this->columns as $column) {
                if (!$column->getOrder()) {
                    $this->order = ($this->order === "") ? $index : $this->order . ', ' . $index;
                }
                $index++;
                //var_dump($index);
                //var_dump($this->order);
            }
        }
    }

    public function generate() {
        $params = $_REQUEST;
        unset($params['class']);
        unset($params['method']);
        // to keep browsing parameters (order, page, first_page, ...)
        $urlparams = '&' . http_build_query($params);

        // inline editing treatment
        TScript::create(" tdatagrid_inlineedit( '{$urlparams}' );");
        //TScript::create(" tdatagrid_enable_groups();");

        $actionCount = count($this->actions);

        if ($this->actionCount !== 0) {
            $actionCount = $this->actionCount;
        }

        $scroll = '';
        if ($this->scrollable > 0) {
            $scroll = '"sScrollY": ' . $this->scrollable . ', '
                    . '"bPaginate" : false,';
        }

        if ($this->enableSearch)
            $opsearh = 'f';
        else
            $opsearh = '';

        if ($this->enableLengthChange)
            $oplength = 'l';
        else
            $oplength = '';

        if ($this->enableInformation)
            $opInformation = 'i';
        else
            $opInformation = '';

        if ($this->enablePagination)
            $opPagination = 'p';
        else
            $opPagination = '';

        if ($this->URLserverside) {
            $ss = '"bProcessing": true,'
                    . '"bServerSide": true,'
                    . '"sServerMethod": "GET",'
                    . '"sAjaxSource": "' . $this->URLserverside . '",';
        } else {
            $ss = '';
        }

        if ($this->columns) {
            $alinhamento = '';
            $i = 0;
            foreach ($this->columns as $column) {
                $align = $column->getAlign();
                if ($align == 'right') {
                    if ($alinhamento !== '') {
                        $alinhamento .= ',' . $i;
                    } else {
                        $alinhamento = $i;
                    }
                }
                $i++;
            }

            $alinhamento = '[' . $alinhamento . ']';
            if (!$this->URLserverside) {
                $alinhamento = '[]';
            }
        }

        $this->generateOrder();


        $responsive = $this->responsive ? 'true' : 'false';

        $ordering = '"ordering": ' . (($this->enableOrder) ? 'true,' : 'false,');

        $orientacao_ordem = 'asc';
        if (isset($this->defaultOrder)) {
            if (isset($this->defaultOrder[1])) {
                $orientacao_ordem = $this->defaultOrder[1];
            }

            $defaultOrder = '"order" : [[' . $this->defaultOrder[0] . ', "' . $orientacao_ordem . '"]],';
        } else {
            $defaultOrder = '';
        }

        TScript::create('function iniciaGrid_' . $this->id . ' () {
                           // alert("inicia");
                        var asInitVals = new Array();
                        //var oTable_' . $this->id . ' ;


                        if ($.fn.dataTable.fnIsDataTable( \'#' . $this->id . '\' ) ) {
                               var oTable_' . $this->id . ' = $(\'#' . $this->id . '\').DataTable();
                        }
                        else{
                               var oTable_' . $this->id . ' = $(\'#' . $this->id . '\').DataTable({
                                "oLanguage": {
                                        "sSearch": "Busca nas colunas:",
                                        "sLengthMenu": "Mostrando _MENU_ registros por página",
                                        "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                                        "sInfoEmpty": "Sem registros",
                                        "sInfoFiltered": " - Filtrado de _MAX_ registros",
                                        "sEmptyTable": "Sem registros",

                                },
                                ' . $defaultOrder . '
                                "aoColumnDefs": [
                                        {
                                                \'bSortable\': false,
                                                \'aTargets\': [' . $this->order . ']' . '
                                        }, //disables sorting for column one
                                        { className: "dt-right", "targets": ' . $alinhamento . '}
                                ],
                                ' . $ss . '
                                "sPaginationType": "full_numbers",
                                "stateSave": true,
                                "responsive": ' . $responsive . ', 
                                ' . $ordering . ' 
                                //  "dom": "lfrtipCT",
                                "dom": \'<"fg-toolbar ui-toolbar ui-widget-header ui-helper-clearfix ui-corner-tl ui-corner-tr"' . $oplength . $opsearh . 'r>t<"fg-toolbar ui-toolbar ui-widget-header ui-helper-clearfix ui-corner-bl ui-corner-br"' . $opInformation . $opPagination . '>\',
                                ' . $scroll . '
                                }
                        )};

                        }
                        
                        setTimeout(function(){
                          $(\'#' . $this->id . '\').DataTable().columns.adjust().draw();
                        },100);

                        //var timeout1 = setTimeout(iniciaGrid_' . $this->id . ',10);
                                      
        ');

        TScript::create('$(document).ready(function() {
                                iniciaGrid_' . $this->id . '();
                            });');
    }

    function show() {
        // shows the datagrid
        parent::show();
        $this->generate();
    }

}
