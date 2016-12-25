<?php
declare(strict_types = 1);
namespace Admin\Mapper;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Db\TableGateway\AbstractTableGateway;

/**
 * Class ArticleMapper.
 *
 * @package Core\Mapper
 */
class ArticleMapper extends AbstractTableGateway implements AdapterAwareInterface
{
    /**
     * @var string
     */
    protected $table = 'articles';

    /**
     * Db adapter setter method,
     *
     * @param  Adapter $adapter db adapter
     * @return void
     */
    public function setDbAdapter(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function fetchAll($params)
    {
        return $this->select($params);
    }

    /**
     * @param string $id
     * @return \ArrayObject
     */
    public function fetchOne($id)
    {
        return $this->select(['article_uuid' => $id])->current();
    }

    public function create($articleData)
    {
        return $this->insert($articleData);
    }

//    public function updateArticle($id, $articleData)
//    {
//        return $this->update($articleData, ['article_uuid' => $id]);
//    }
}