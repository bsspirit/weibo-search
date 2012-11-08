//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.dao;

import java.util.List;
import java.util.Map;
import org.conan.base.dao.MybatisDAO;

import org.conan.search.weibo.model.LoadUserDTO;

/**
 * This is LoadUser DAO interface
 * @author Conan Zhang
 * @date 2012-11-08
 */
public interface LoadUserDAO extends MybatisDAO {

    int insertLoadUser(LoadUserDTO dto);
    int updateLoadUser(LoadUserDTO dto);
    int deleteLoadUser(int id);
    int deleteLoadUsers (LoadUserDTO dto);

    LoadUserDTO getLoadUserById(int id);
    LoadUserDTO getLoadUserOne(Map<String,Object> paramMap);
    List<LoadUserDTO> getLoadUsers(Map<String,Object> paramMap);
    int getLoadUsersCount(Map<String,Object> paramMap);
}

