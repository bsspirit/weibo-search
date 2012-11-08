//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.dao;

import java.util.List;
import java.util.Map;
import org.conan.base.dao.MybatisDAO;

import org.conan.search.weibo.model.UserSignDTO;

/**
 * This is UserSign DAO interface
 * @author Conan Zhang
 * @date 2012-11-07
 */
public interface UserSignDAO extends MybatisDAO {

    int insertUserSign(UserSignDTO dto);
    int updateUserSign(UserSignDTO dto);
    int deleteUserSign(int id);
    int deleteUserSigns (UserSignDTO dto);

    UserSignDTO getUserSignById(int id);
    UserSignDTO getUserSignOne(Map<String,Object> paramMap);
    List<UserSignDTO> getUserSigns(Map<String,Object> paramMap);
    int getUserSignsCount(Map<String,Object> paramMap);
}

