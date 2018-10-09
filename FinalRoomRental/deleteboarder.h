#ifndef DELETEBOARDER_H
#define DELETEBOARDER_H

#include <QWidget>
#include "rents.h"

namespace Ui {
class DeleteBoarder;
}

class DeleteBoarder : public QWidget
{
    Q_OBJECT

public:
    explicit DeleteBoarder(QWidget *parent = 0);
    ~DeleteBoarder();

private slots:
    void on_search_clicked();

    void on_tableView_clicked(const QModelIndex &index);

    void on_delete_2_clicked();

    void on_cancel_clicked();


private:
    Ui::DeleteBoarder *ui;
    QSqlTableModel *model;
    int eID;
    QString FirstName;
    QString SecondName;
    QString MiddleName;
    QString LastName;
    QString HomeAddress;
    QString School;
    QString Course;
    int Balance;

};

#endif // DELETEBOARDER_H
