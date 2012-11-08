//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.service.impl;

import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import org.conan.base.service.SpringServiceImpl;
import org.conan.base.service.PageInObject;
import org.conan.base.service.PageOutObject;

import org.conan.search.weibo.dao.UserSignDAO;
import org.conan.search.weibo.service.UserSignService;
import org.conan.search.weibo.model.UserSignDTO;

/**
 * This is UserSign Service implemention
 * @author Conan Zhang
 * @date 2012-11-07
 */
@Service(value="userSignService")
public class UserSignServiceImpl extends SpringServiceImpl implements UserSignService {

    @Autowired
    UserSignDAO userSignDAO;

    public int insertUserSign(UserSignDTO dto) {
        return userSignDAO.insertUserSign(dto);
    }
    
    public int updateUserSign(UserSignDTO dto) {
        return userSignDAO.updateUserSign(dto);
    }
    
    public int saveUserSign(UserSignDTO dto) {
        if (dto.getId() > 0) {
            return updateUserSign(dto);
        }
        return insertUserSign(dto);
    }

    public int saveUserSign(UserSignDTO dto, Map<String, Object> paramMap) {
        UserSignDTO obj = getUserSignOne(paramMap);
        if (obj != null) {
            dto.setId(obj.getId());
            return updateUserSign(dto);
        }
         return insertUserSign(dto);
    }

    public int deleteUserSign(int id) {
        return userSignDAO.deleteUserSign(id);
    }

	public int deleteUserSign(UserSignDTO dto) {
        return userSignDAO.deleteUserSigns(dto);
    }

    public UserSignDTO getUserSignById(int id) {
        return userSignDAO.getUserSignById(id);
    }
    
    public UserSignDTO getUserSignOne(Map<String, Object> paramMap) {
        return userSignDAO.getUserSignOne(paramMap);
    }

    public List<UserSignDTO> getUserSigns(Map<String, Object> paramMap) {
        return userSignDAO.getUserSigns(paramMap);
    }

    public PageOutObject<UserSignDTO> getUserSignsPaging(Map<String, Object> paramMap, PageInObject page) {
        paramMap.put("page", page);
        List<UserSignDTO> list = userSignDAO.getUserSigns(paramMap);
        int count = userSignDAO.getUserSignsCount(paramMap);
        return new PageOutObject<UserSignDTO>(count, list, page);
    }
    
    public int getUserSignsCount(Map<String, Object> paramMap) {
        return userSignDAO.getUserSignsCount(paramMap);
    }

}
