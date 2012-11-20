package org.conan.search.weibo.web.rest;

import java.io.IOException;

import org.apache.log4j.Logger;
import org.conan.search.weibo.action.TaskService;
import org.conan.search.weibo.web.WebController;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import weibo4j.examples.oauth2.Log;
import weibo4j.model.WeiboException;

@Controller
@RequestMapping("/api")
public class ApiController extends WebController {

    final private static Logger log = Logger.getLogger(Log.class.getName());
    
    final private static String token = "2.00v9eSLCzzDJbE8e025c068aftigRE";

    @Autowired
    TaskService taskService;

    @RequestMapping(value = "/load/screen/{screen}", method = RequestMethod.GET)
    public HttpEntity<?> load(@PathVariable(value = "screen") String screen) throws WeiboException, IOException {
        log.info("/api/load/" + screen);
        taskService.load(screen, token);
        return new ResponseEntity<Integer>(1, HttpStatus.OK);
    }

    @RequestMapping(value = "/load/uid/{uid}", method = RequestMethod.GET)
    public HttpEntity<?> load(@PathVariable(value = "uid") Long uid) throws WeiboException, IOException {
        log.info("/api/load/" + uid);
        taskService.load(uid, token);
        return new ResponseEntity<Integer>(1, HttpStatus.OK);
    }

    @RequestMapping(value = "/loadDB", method = RequestMethod.GET)
    public HttpEntity<?> loadDB() throws WeiboException, IOException {
        log.info("/api/loadDB");
        taskService.loadDB(token);
        return new ResponseEntity<Integer>(1, HttpStatus.OK);
    }

    // @RequestMapping(value = "/demo", method = RequestMethod.GET)
    // public HttpEntity<?> demo() throws WeiboException {
    // ProvinceUtil.initProvince();
    // return new ResponseEntity<Integer>(1, HttpStatus.OK);
    // }

}
