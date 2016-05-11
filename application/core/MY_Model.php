<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{

	public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /*
	 * EXECUTE CUSTOM QUERY
     */

    public function query($query)
    {
    	return $this->db->query($query);
    }

    /*
	 * DO INSERT
     */

	public function insert($config)
	{
		if(isset($config['tabel']) && isset($config['data']))
		{
			return $this->db->insert($config['tabel'], $config['data']);
		}

	}

	public function insertBatch($config)
	{
		if(isset($config['tabel']) && isset($config['data']))
		{
			return $this->db->insert_batch($config['tabel'], $config['data']);
		}

	}

    /*
	 * DO UPDATE
     */

	public function update($config)
	{
		if(isset($config['tabel']) && isset($config['data']))
		{

			if(isset($config['where']))
			{
				$this->db->where($config['where']);
			}

			return $this->db->update($config['tabel'], $config['data']);
		}
	}

    /*
	 * DO DELETE
     */

	public function delete($config)
	{
		if(isset($config['tabel']))
		{

			if(isset($config['where']))
			{
				$this->db->where($config['where']);
			}

			return $this->db->delete($config['tabel']);
		}

	}

    /*
	 * DO GET
     */

	public function get($config)
	{

		// SELECT
		if(isset($config['select']))
		{
			$this->db->select($config['select']);
		}

		// FROM
		if (isset($config['tabel'])) 
		{
			$this->db->from($config['tabel']);
		}

		// JOIN
		if (isset($config['join'])) 
		{
			foreach ($config['join'] as $join=>$val) {
				$this->db->join($join, $val);
			}
		}

		//LEFT JOIN
		if (isset($config['join_plus'])) 
		{
			foreach ($config['join_plus'] as $join) {
				$this->db->join($join['to'], $join['on'], $join['by']);
			}
		}

		// WHERE
		if (isset($config['where']))
		{
			$this->db->where($config['where']);
		}

		// WHERE_OR
		if (isset($config['where_or']))
		{
			$this->db->or_where($config['where_or']);
		}

		// WHERE_IN
		if (isset($config['where_in']))
		{
			$this->db->where_in($config['where_in'][0], $config['where_in'][1]);
		}

		// WHERE_NOT_IN
		if (isset($config['where_not_in']))
		{
			$this->db->where_not_in($config['where_not_in'][0], $config['where_not_in'][1]);
		}

		// LIKE
		if (isset($config['like']))
		{
			$this->db->like($config['like']);
		}

		// OR_LIKE
		if (isset($config['or_like']))
		{
			$this->db->like($config['or_like']);
		}

		// NOT_LIKE
		if (isset($config['not_like']))
		{
			$this->db->like($config['not_like']);
		}

		// GROUP BY
		if (isset($config['group_by']))
		{
			$this->db->group_by($config['group_by']);
		}

		// HAVING
		if (isset($config['having'])) 
		{
			$this->db->having($config['having']);
		}

		// ORDER_BY
		if (isset($config['order_by'])) 
		{
			$this->db->order_by($config['order_by']);
		}

		// LIMIT
		if (isset($config['limit']))
		{
			$this->db->limit($config['limit']);
		}

		// DISTINCT
		if (isset($config['distinct'])) {
			$this->db->distinct();
		}

		// return $this->db->get_compiled_select();
		return $this->db->get();


	}

}