#ifndef EDITWINDOW_H
#define EDITWINDOW_H

#include <QWidget>
#include "rents.h"

namespace Ui {
class EditWindow;
}

class EditWindow : public QWidget
{
    Q_OBJECT

public:
    explicit EditWindow(QWidget *parent = 0);
    ~EditWindow();
    void loadDatabase();

private slots:
    void on_search_clicked();

    void on_tableView_clicked(const QModelIndex &index);

    void on_cancel_clicked();


private:
    Ui::EditWindow *ui;
    int eID;
    QString FirstName;
    QString SecondName;
    QString MiddleName;
    QString LastName;
    QString HomeAddress;
    QString School;
    QString Course;
    int Balance;
    QSqlDatabase db;
};

#endif // EDITWINDOW_H
