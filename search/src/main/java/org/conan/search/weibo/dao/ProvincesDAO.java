//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.dao;

import java.util.List;
import java.util.Map;
import org.conan.base.dao.MybatisDAO;

import org.conan.search.weibo.model.ProvincesDTO;

/**
 * This is Provinces DAO interface
 * @author Conan Zhang
 * @date 2012-11-06
 */
public interface ProvincesDAO extends MybatisDAO {

    int insertProvinces(ProvincesDTO dto);
    int updateProvinces(ProvincesDTO dto);
    int deleteProvinces(int id);
    int deleteProvincess (ProvincesDTO dto);

    ProvincesDTO getProvincesById(int id);
    ProvincesDTO getProvincesOne(Map<String,Object> paramMap);
    List<ProvincesDTO> getProvincess(Map<String,Object> paramMap);
    int getProvincessCount(Map<String,Object> paramMap);
}

