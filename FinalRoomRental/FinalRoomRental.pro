#-------------------------------------------------
#
# Project created by QtCreator 2016-10-17T21:54:48
#
#-------------------------------------------------

QT       += core gui multimedia
QT       += sql

greaterThan(QT_MAJOR_VERSION, 4): QT += widgets

TARGET = FinalRoomRental
TEMPLATE = app


SOURCES += main.cpp\
    addboarder.cpp \
    adminguest.cpp \
    createuser.cpp \
    deleteboarder.cpp \
    editwindow.cpp \
    editwindow2.cpp \
    login.cpp \
    login2.cpp \
    notification.cpp \
    popupaddboarder.cpp \
    popupcreateaccount.cpp \
    popupdeleteboarder.cpp \
    popupeditboardersave.cpp \
    profile.cpp \
    rents.cpp

HEADERS  += \
    addboarder.h \
    adminguest.h \
    createuser.h \
    deleteboarder.h \
    editwindow.h \
    editwindow2.h \
    login.h \
    login2.h \
    notification.h \
    popupaddboarder.h \
    popupcreateaccount.h \
    popupdeleteboarder.h \
    popupeditboardersave.h \
    profile.h \
    rents.h

FORMS    += \
    rents.ui \
    addboarder.ui \
    adminguest.ui \
    createuser.ui \
    deleteboarder.ui \
    editwindow.ui \
    editwindow2.ui \
    login.ui \
    login2.ui \
    notification.ui \
    popupaddboarder.ui \
    popupcreateaccount.ui \
    popupdeleteboarder.ui \
    popupeditboardersave.ui \
    profile.ui

CONFIG += mobility
MOBILITY = 

