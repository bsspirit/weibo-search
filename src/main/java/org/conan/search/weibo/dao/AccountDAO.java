//Create by Conan, 2010 - 2012. E-mail:bsspirit@gmail.com
package org.conan.search.weibo.dao;

import java.util.List;
import java.util.Map;
import org.conan.base.dao.MybatisDAO;

import org.conan.search.weibo.model.AccountDTO;

/**
 * This is Account DAO interface
 * @author Conan Zhang
 * @date 2012-11-06
 */
public interface AccountDAO extends MybatisDAO {

    int insertAccount(AccountDTO dto);
    int updateAccount(AccountDTO dto);
    int deleteAccount(int id);
    int deleteAccounts (AccountDTO dto);

    AccountDTO getAccountById(int id);
    AccountDTO getAccountOne(Map<String,Object> paramMap);
    List<AccountDTO> getAccounts(Map<String,Object> paramMap);
    int getAccountsCount(Map<String,Object> paramMap);
}

