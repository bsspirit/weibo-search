//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.service;

import java.util.List;
import java.util.Map;
import org.conan.base.service.PageInObject;
import org.conan.base.service.PageOutObject;
import org.conan.base.service.SpringService;

import org.conan.search.weibo.model.UserSignDTO;

/**
 * This is UserSign DAO interface
 * @author Conan Zhang
 * @date 2012-11-07
 */
public interface UserSignService extends SpringService {

    int insertUserSign(UserSignDTO dto);
    int updateUserSign(UserSignDTO dto);
    int saveUserSign(UserSignDTO dto);
    int saveUserSign(UserSignDTO dto, Map<String,Object> paramMap);
    int deleteUserSign(int id);
    int deleteUserSign(UserSignDTO dto);
    

    UserSignDTO getUserSignById(int id);
    UserSignDTO getUserSignOne(Map<String,Object> paramMap);
    List<UserSignDTO> getUserSigns(Map<String,Object> paramMap);
    PageOutObject<UserSignDTO> getUserSignsPaging(Map<String,Object> paramMap, PageInObject page);
    int getUserSignsCount(Map<String,Object> paramMap);
}

