package org.conan.base.util;

import org.conan.base.exception.MyException;

public final class MyCast {

    /**
     * 转换字符串到整形
     * 
     * @param s
     *            转换的字符串
     * @param def
     *            输出的默认值
     */
    public static int string2Int(String s, int def) {
        int tmp = def;
        if (s != null && !s.equals("")) {
            try {
                tmp = Integer.parseInt(s);
            } catch (Exception e) {
            }
        }
        return tmp;
    }

    public static boolean empty(String s) {
        return (s != null && !s.equals("") && s.length() > 0) ? false : true;
    }

    public static void emptyCheck(String s) throws MyException {
        emptyCheck(s, "input");
    }

    public static void emptyCheck(String s, String desc) throws MyException {
        if (empty(s))
            throw new MyException("Exception: " + desc + " is null.");

    }
}
