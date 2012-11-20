package org.conan.base.exception;

import org.apache.log4j.Logger;

import weibo4j.examples.oauth2.Log;
import weibo4j.model.WeiboException;

public class WeiboExceptionParser {

    public static enum SITE {
        CLIENT, SERVER, ALL
    }

    final private static Logger log = Logger.getLogger(Log.class.getName());

    public static void parserCode(WeiboException we, SITE site) throws WeiboException {
        String msg = we.getMessage();
        log.warn(msg);

        int code = Integer.parseInt(msg.substring(0, msg.indexOf(":")));

        switch (site) {
        case CLIENT:
            if (code >= 500)
                throw new WeiboException(we);
            parserCode(we, code);
            break;
        case SERVER:
            if (code < 500)
                throw new WeiboException(we);
            parserCode(we, code);
            break;
        case ALL:
            parserCode(we, code);
            break;
        }
    }

    private static void parserCode(WeiboException we, int code) throws WeiboException {
        switch (code) {
        case 400:
            break;
        case 401:
            break;
        case 402:
            break;
        case 403:
            break;
        case 404:
            break;
        case 405:
            break;
        case 500:
            break;
        case 501:
            break;
        case 502:
            break;
        default:
            throw new WeiboException(we);
        }
    }

    public static void parserV2Code(WeiboException we) throws WeiboException {
        String msg = we.getMessage();
        log.warn(msg);
        int v2code = Integer.parseInt(msg.substring(msg.indexOf("error_code:") + 12, 5));

        switch (v2code) {
        case 20003:
            break;
        }
    }

}
