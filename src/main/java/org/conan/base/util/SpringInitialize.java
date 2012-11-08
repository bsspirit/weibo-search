package org.conan.base.util;

import java.util.HashMap;
import java.util.Map;

import org.springframework.context.ApplicationContext;
import org.springframework.context.support.ClassPathXmlApplicationContext;

abstract public class SpringInitialize {

    protected static Map<String, String> inputObj = new HashMap<String, String>();

    protected SpringInitialize() {
    }

    private static ApplicationContext ctx = null;

    protected static ApplicationContext getContext() {
        if (ctx == null) {
            ctx = new ClassPathXmlApplicationContext("spring.xml");
        }
        return ctx;
    }

    protected void run(String[] args) {
        input(args);
        task();
    }

    abstract protected void input(String[] args);
    abstract protected void task();
    abstract protected void help();

}
