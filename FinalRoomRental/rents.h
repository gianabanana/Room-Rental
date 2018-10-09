#ifndef RENTS_H
#define RENTS_H

#include <QWidget>
#include <QSqlDatabase>
#include <QSqlTableModel>
#include <QSqlError>
#include <QDebug>
#include "QSqlRelationalTableModel"
#include "QtSql"
#include "QSqlQuery"
#include "adminguest.h"
#include "login.h"
#include "login2.h"
#include "createuser.h"
#include "addboarder.h"
#include "editwindow.h"
#include "editwindow2.h"
#include "deleteboarder.h"
#include "profile.h"
#include "notification.h"
#include "popupaddboarder.h"
#include "popupeditboardersave.h"
#include "popupdeleteboarder.h"
#include "popupcreateaccount.h"
#include <QTimer>
#include <QTime>
#include <QSettings>
#include <QTabWidget>
#include <QTabBar>
#include <QPaintDevice>
#include <QObject>
#include <QStyle>
#include <cmath>
#include <QFileDialog>
#include <QStandardItemModel>

namespace Ui {
class Rents;
}

class Rents : public QWidget
{
    Q_OBJECT

public:
    explicit Rents(QWidget *parent = 0);
    ~Rents();
    void loadDatabase();
    void readSettings();
    void writeSettings();
    void records();
    QTimer *timer;

private slots:
    void on_add_clicked();

    void on_edit_clicked();

    void on_delete_2_clicked();

    void on_logout_clicked();


public slots:
    void update();

private:
    Ui::Rents *ui;
    int eID;
    int RoomNumber;
};

#endif // RENTS_H
