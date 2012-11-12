package org.conan.base.exception;

public class MyException extends Exception {

    private static final long serialVersionUID = 6873383328723257926L;

    public MyException() {
    }

    public MyException(String msg) {
        super(msg);
    }

    public MyException(Exception e) {
        super(e);
    }

    public MyException(String msg, Exception e) {
        super(msg, e);
    }

}
